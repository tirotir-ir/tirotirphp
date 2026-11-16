<?php
declare(strict_types=1);
session_start();

// SQLite file next to this script (change the DSN to use MySQL)
$pdo = new PDO("sqlite:" . __DIR__ . "/contacts.sqlite", null, null, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
$pdo->exec("CREATE TABLE IF NOT EXISTS contacts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    phone TEXT NOT NULL
)");

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

if (empty($_SESSION["csrf"])) {
    $_SESSION["csrf"] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!hash_equals($_SESSION["csrf"], (string) ($_POST["csrf"] ?? ""))) {
        http_response_code(403);
        exit("Invalid CSRF token.");
    }

    $action = $_POST["action"] ?? "";
    $id     = (int) ($_POST["id"] ?? 0);
    $name   = trim((string) ($_POST["name"] ?? ""));
    $phone  = trim((string) ($_POST["phone"] ?? ""));

    if ($action === "add" && $name !== "" && $phone !== "") {
        $pdo->prepare("INSERT INTO contacts (name, phone) VALUES (?, ?)")->execute([$name, $phone]);
    } elseif ($action === "update" && $id > 0 && $name !== "" && $phone !== "") {
        $pdo->prepare("UPDATE contacts SET name = ?, phone = ? WHERE id = ?")->execute([$name, $phone, $id]);
    } elseif ($action === "delete" && $id > 0) {
        $pdo->prepare("DELETE FROM contacts WHERE id = ?")->execute([$id]);
    }

    // Post/Redirect/Get: avoids duplicate submits on refresh
    header("Location: " . basename(__FILE__));
    exit;
}

$editing = null;
if (isset($_GET["edit"])) {
    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([(int) $_GET["edit"]]);
    $editing = $stmt->fetch() ?: null;
}
$contacts = $pdo->query("SELECT * FROM contacts ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacts</title>
</head>
<body>
    <h1>Contacts</h1>

    <form method="post" action="">
        <input type="hidden" name="csrf" value="<?= e($_SESSION["csrf"]) ?>">
        <input type="hidden" name="action" value="<?= $editing ? "update" : "add" ?>">
        <input type="hidden" name="id" value="<?= $editing ? (int) $editing["id"] : 0 ?>">
        <label>Name: <input type="text" name="name" value="<?= e($editing["name"] ?? "") ?>" required></label>
        <label>Phone: <input type="text" name="phone" value="<?= e($editing["phone"] ?? "") ?>" required></label>
        <input type="submit" value="<?= $editing ? "Update" : "Add" ?>">
    </form>

    <table border="1" cellpadding="6">
        <tr><th>Name</th><th>Phone</th><th></th></tr>
        <?php foreach ($contacts as $c): ?>
            <tr>
                <td><?= e($c["name"]) ?></td>
                <td><?= e($c["phone"]) ?></td>
                <td>
                    <a href="?edit=<?= (int) $c["id"] ?>">Edit</a>
                    <form method="post" action="" style="display:inline">
                        <input type="hidden" name="csrf" value="<?= e($_SESSION["csrf"]) ?>">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= (int) $c["id"] ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
// Saved as phonebook-list.php.
// Local development only: root with an empty password. Use a dedicated user and a strong password in production.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli("localhost", "root", "", "phonebook_db");
$conn->set_charset("utf8mb4");
$rows = $conn->query("SELECT name, phone_number, email FROM phonebook ORDER BY id DESC")->fetch_all(MYSQLI_ASSOC);
$conn->close();

// Always escape database values when printing them (XSS)
function e(?string $value): string
{
    return htmlspecialchars($value ?? "", ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phonebook</title>
</head>
<body>
    <h1>Phonebook</h1>
    <table border="1" cellpadding="6">
        <tr><th>Name</th><th>Phone</th><th>Email</th></tr>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= e($row["name"]) ?></td>
                <td><?= e($row["phone_number"]) ?></td>
                <td><?= e($row["email"]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

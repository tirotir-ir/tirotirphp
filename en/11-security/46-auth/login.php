<?php
declare(strict_types=1);
require __DIR__ . "/bootstrap.php";
// Saved as login.php. Part of the login system (log in).

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    csrf_check();
    $username = trim((string) ($_POST["username"] ?? ""));
    $password = (string) ($_POST["password"] ?? "");

    $stmt = db()->prepare("SELECT id, password_hash FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password_hash"])) {
        // Prevents session fixation: a new id after a successful login
        session_regenerate_id(true);
        $_SESSION["user_id"] = (int) $user["id"];

        // Upgrade the stored hash if PHP now recommends a stronger one
        if (password_needs_rehash($user["password_hash"], PASSWORD_DEFAULT)) {
            db()->prepare("UPDATE users SET password_hash = ? WHERE id = ?")
                ->execute([password_hash($password, PASSWORD_DEFAULT), $user["id"]]);
        }
        header("Location: dashboard.php");
        exit;
    }

    // Same message for unknown user and wrong password
    $error = "Invalid username or password.";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
</head>
<body>
    <h1>Log in</h1>
    <?php if (isset($_GET["registered"])): ?>
        <p>Account created. You can log in now.</p>
    <?php endif; ?>
    <?php if ($error !== ""): ?>
        <p style="color:#b00020"><?= e($error) ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <input type="submit" value="Log in">
    </form>
    <p><a href="register.php">Create an account</a></p>
</body>
</html>

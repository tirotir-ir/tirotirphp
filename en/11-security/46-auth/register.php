<?php
declare(strict_types=1);
require __DIR__ . "/bootstrap.php";
// Saved as register.php. Part of the login system (sign up).

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    csrf_check();
    $username = trim((string) ($_POST["username"] ?? ""));
    $password = (string) ($_POST["password"] ?? "");

    if (mb_strlen($username) < 3) {
        $errors[] = "Username must be at least 3 characters.";
    }
    if (mb_strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }

    if (!$errors) {
        try {
            // Never store plain passwords: password_hash adds a random salt and uses a strong algorithm
            $hash = password_hash($password, PASSWORD_DEFAULT);
            db()->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)")->execute([$username, $hash]);
            header("Location: login.php?registered=1");
            exit;
        } catch (PDOException $e) {
            $errors[] = "This username is already taken.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
</head>
<body>
    <h1>Sign up</h1>
    <?php foreach ($errors as $error): ?>
        <p style="color:#b00020"><?= e($error) ?></p>
    <?php endforeach; ?>
    <form method="post" action="">
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <input type="submit" value="Create account">
    </form>
    <p><a href="login.php">Already registered? Log in</a></p>
</body>
</html>

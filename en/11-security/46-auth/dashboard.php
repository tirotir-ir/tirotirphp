<?php
declare(strict_types=1);
require __DIR__ . "/bootstrap.php";
// Saved as dashboard.php. Part of the login system (protected page).

require_login();
$user = current_user();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?= e($user["username"]) ?></h1>
    <p>This page is visible only after logging in.</p>
    <form method="post" action="logout.php">
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <input type="submit" value="Log out">
    </form>
</body>
</html>

<?php
session_start();

// Create one random token per session
if (empty($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // hash_equals compares in constant time
    $sent = $_POST["csrf_token"] ?? "";
    if (!hash_equals($_SESSION["csrf_token"], $sent)) {
        http_response_code(403);
        exit("Invalid CSRF token.");
    }
    $message = "Saved: " . htmlspecialchars($_POST["note"] ?? "", ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSRF-protected form</title>
</head>
<body>
    <form method="post" action="">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION["csrf_token"]) ?>">
        <label>Note: <input type="text" name="note" required></label>
        <input type="submit" value="Save">
    </form>
    <p><?= $message ?></p>
</body>
</html>

<?php
declare(strict_types=1);
require __DIR__ . "/bootstrap.php";
// Saved as logout.php. Part of the login system (log out).

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    csrf_check();

    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $p = session_get_cookie_params();
        setcookie(session_name(), "", time() - 3600, $p["path"], $p["domain"], $p["secure"], $p["httponly"]);
    }
    session_destroy();
}

header("Location: login.php");
exit;

<?php
// Set cookie options before starting the session
session_set_cookie_params([
    "httponly" => true,
    "samesite" => "Lax",
]);

// Start the session
session_start();

// Store a session variable
$_SESSION["username"] = "John";

echo "Session saved. Open session-access.php next.";

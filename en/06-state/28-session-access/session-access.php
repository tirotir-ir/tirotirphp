<?php
session_start();

// Read a session variable (with a default)
echo "Username: " . htmlspecialchars($_SESSION["username"] ?? "guest");

// Log out: clear the data, then destroy the session
// $_SESSION = [];
// session_destroy();

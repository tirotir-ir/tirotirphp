<?php
// Cookies must be set before any output
setcookie("theme", "dark", [
    "expires"  => time() + 60 * 60 * 24 * 30, // 30 days
    "path"     => "/",
    "httponly" => true,   // not readable from JavaScript
    "samesite" => "Lax",  // limits cross-site sending
    // "secure" => true,  // enable on HTTPS sites
]);

// A new cookie is visible in $_COOKIE only on the next request
$theme = $_COOKIE["theme"] ?? "light";
echo "Current theme: " . htmlspecialchars($theme);

// Delete a cookie: set it with a past expiry
// setcookie("theme", "", time() - 3600, "/");

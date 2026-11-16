<?php
// Saved as submit.php. Pairs with form.php (same folder).
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"])) {
    // Trim and escape the input before printing it
    $name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, "UTF-8");

    echo "Hello, " . $name . "!";
} else {
    echo "No data submitted.";
}

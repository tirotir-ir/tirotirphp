<?php
// Saved as submit-get.php. Pairs with form-get.php (same folder).
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["name"])) {
    $name = htmlspecialchars(trim($_GET["name"]), ENT_QUOTES, "UTF-8");

    echo "Hello, " . $name . "!";
} else {
    echo "No data submitted.";
}

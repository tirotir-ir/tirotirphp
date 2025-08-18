<?php
// Check if form data is sent using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the name from the input and sanitize it
    $name = htmlspecialchars($_POST['name']);

    // Display a greeting message
    echo "Hello, " . $name . "!";
} else {
    echo "No data submitted.";
}
?>

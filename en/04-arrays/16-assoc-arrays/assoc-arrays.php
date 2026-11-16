<?php
// Create an associative array
$student = ["name" => "John", "age" => 20];

// Access values by key
echo "Name: " . $student["name"] . PHP_EOL;

// Add or change a key
$student["city"] = "Tehran";

// Check that a key exists
if (array_key_exists("city", $student)) {
    echo "City: " . $student["city"] . PHP_EOL;
}

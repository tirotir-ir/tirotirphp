<?php
// Create an array
$colors = ["Red", "Green", "Blue"];

// Access elements by index (starts at 0)
echo $colors[0] . PHP_EOL;

// Add an element and count
$colors[] = "Yellow";
echo count($colors) . PHP_EOL;

// Print the whole array
print_r($colors);

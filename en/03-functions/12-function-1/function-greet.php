<?php
// Function to greet a user
function greet(string $name): void
{
    echo "Hello, " . $name . PHP_EOL;
}

// Call the function
greet("Alice");

<?php
$text = "Hello, World!";

echo "Length: " . strlen($text) . PHP_EOL;
echo strtoupper($text) . PHP_EOL;
echo str_replace("World", "PHP", $text) . PHP_EOL;
echo substr($text, 0, 5) . PHP_EOL;
echo "Position of World: " . strpos($text, "World") . PHP_EOL;

// Split a string into an array and join it back
$words = explode(" ", "one two three");
echo implode("-", $words) . PHP_EOL;

// Note: for Persian / non-English text use the mb_* functions (see the mb_strings example)

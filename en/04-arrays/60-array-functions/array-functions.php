<?php
$numbers = [5, 3, 8, 1, 9, 2];

// array_map: transform every element
$squares = array_map(fn(int $n): int => $n * $n, $numbers);

// array_filter: keep elements that match
$even = array_filter($numbers, fn(int $n): bool => $n % 2 === 0);

// array_reduce: fold into one value
$sum = array_reduce($numbers, fn(int $carry, int $n): int => $carry + $n, 0);

echo "Squares: " . implode(", ", $squares) . PHP_EOL;
echo "Even: " . implode(", ", $even) . PHP_EOL;
echo "Sum: $sum" . PHP_EOL;

// Sort a list of records with usort and the spaceship operator
$people = [
    ["name" => "Ali", "age" => 31],
    ["name" => "Sara", "age" => 24],
    ["name" => "Reza", "age" => 28],
];
usort($people, fn(array $a, array $b): int => $a["age"] <=> $b["age"]);
echo implode(", ", array_column($people, "name")) . PHP_EOL;

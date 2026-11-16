<?php
$numbers = [5, 3, 8, 1, 9, 2];

// array_map: تبدیل همهٔ عناصر
$squares = array_map(fn(int $n): int => $n * $n, $numbers);

// array_filter: نگه داشتن عناصر مطابق شرط
$even = array_filter($numbers, fn(int $n): bool => $n % 2 === 0);

// array_reduce: تبدیل به یک مقدار
$sum = array_reduce($numbers, fn(int $carry, int $n): int => $carry + $n, 0);

echo "مربع‌ها: " . implode(", ", $squares) . PHP_EOL;
echo "زوج‌ها: " . implode(", ", $even) . PHP_EOL;
echo "مجموع: $sum" . PHP_EOL;

// مرتب‌سازی فهرست رکوردها با usort و عملگر <=>
$people = [
    ["name" => "Ali", "age" => 31],
    ["name" => "Sara", "age" => 24],
    ["name" => "Reza", "age" => 28],
];
usort($people, fn(array $a, array $b): int => $a["age"] <=> $b["age"]);
echo implode(", ", array_column($people, "name")) . PHP_EOL;

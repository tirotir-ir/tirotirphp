<?php
declare(strict_types=1);

$status = 404;

// match compares with === and returns a value
$message = match ($status) {
    200, 201 => "OK",
    301, 302 => "Redirect",
    404      => "Not Found",
    500      => "Server Error",
    default  => "Unknown status",
};
echo "$status: $message" . PHP_EOL;

// match (true) works like an if / elseif chain
$score = 82;
$grade = match (true) {
    $score >= 90 => "A",
    $score >= 80 => "B",
    $score >= 70 => "C",
    default      => "F",
};
echo "Grade: $grade" . PHP_EOL;

// Without a matching arm and without default, PHP throws UnhandledMatchError

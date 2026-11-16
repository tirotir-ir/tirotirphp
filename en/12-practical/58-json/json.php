<?php
declare(strict_types=1);

$data = [
    "name"   => "Ali",
    "skills" => ["PHP", "HTML", "CSS"],
    "active" => true,
];

// Readable output that keeps Persian letters as they are
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
echo $json . PHP_EOL;

// true = associative arrays, false = objects
$back = json_decode($json, true);
echo $back["skills"][0] . PHP_EOL;

// JSON_THROW_ON_ERROR turns silent failures into exceptions
try {
    json_decode("{broken", true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo "Invalid JSON: " . $e->getMessage() . PHP_EOL;
}

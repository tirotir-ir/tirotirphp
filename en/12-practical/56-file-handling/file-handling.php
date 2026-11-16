<?php
declare(strict_types=1);

// Work inside the system temp folder so this demo is harmless
$path = sys_get_temp_dir() . "/tirotirphp-demo.txt";

// Write (LOCK_EX avoids two scripts writing at once)
file_put_contents($path, "line 1" . PHP_EOL, LOCK_EX);
file_put_contents($path, "line 2" . PHP_EOL, FILE_APPEND | LOCK_EX);

// Read the whole file, or line by line
echo file_get_contents($path);
foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $number => $line) {
    echo ($number + 1) . ": $line" . PHP_EOL;
}

// CSV: fputcsv quotes values correctly
$csv = sys_get_temp_dir() . "/tirotirphp-demo.csv";
$handle = fopen($csv, "w");
fputcsv($handle, ["name", "city"]);
fputcsv($handle, ["Ali", "Tehran, Iran"]);
fclose($handle);

$handle = fopen($csv, "r");
while (($row = fgetcsv($handle)) !== false) {
    echo implode(" | ", $row) . PHP_EOL;
}
fclose($handle);

// Clean up
unlink($path);
unlink($csv);

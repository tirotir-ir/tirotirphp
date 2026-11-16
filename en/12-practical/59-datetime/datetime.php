<?php
declare(strict_types=1);

date_default_timezone_set("Asia/Tehran");

$now  = new DateTimeImmutable("2026-11-04 10:30:00");
$next = $now->modify("+1 week");   // immutable: returns a new object

echo $now->format("Y-m-d H:i") . " -> " . $next->format("Y-m-d H:i") . PHP_EOL;

// Difference between two dates
$birthday = new DateTimeImmutable("2026-12-31");
$diff = $now->diff($birthday);
echo "Days left: " . $diff->days . PHP_EOL;

// Compare with the usual operators
var_dump($now < $next);

// Convert to another time zone
echo $now->setTimezone(new DateTimeZone("UTC"))->format("H:i T") . PHP_EOL;

// Loop over a range of days
foreach (new DatePeriod($now, new DateInterval("P1D"), 3) as $day) {
    echo $day->format("D d M") . PHP_EOL;
}

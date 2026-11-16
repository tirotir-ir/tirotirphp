<?php
// ساخت آرایه
$colors = ["Red", "Green", "Blue"];

// دسترسی به عناصر با اندیس (از ۰ شروع می‌شود)
echo $colors[0] . PHP_EOL;

// افزودن عنصر و شمارش
$colors[] = "Yellow";
echo count($colors) . PHP_EOL;

// چاپ کل آرایه
print_r($colors);

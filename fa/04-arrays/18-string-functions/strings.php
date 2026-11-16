<?php
$text = "Hello, World!";

echo "طول: " . strlen($text) . PHP_EOL;
echo strtoupper($text) . PHP_EOL;
echo str_replace("World", "PHP", $text) . PHP_EOL;
echo substr($text, 0, 5) . PHP_EOL;
echo "موقعیت World: " . strpos($text, "World") . PHP_EOL;

// تبدیل رشته به آرایه و برگرداندن آن
$words = explode(" ", "one two three");
echo implode("-", $words) . PHP_EOL;

// نکته: برای متن فارسی و غیرانگلیسی از توابع mb_* استفاده کنید (مثال mb_strings)

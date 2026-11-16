<?php
// ساخت آرایهٔ انجمنی
$student = ["name" => "John", "age" => 20];

// دسترسی به مقدار با کلید
echo "نام: " . $student["name"] . PHP_EOL;

// افزودن یا تغییر یک کلید
$student["city"] = "Tehran";

// بررسی وجود کلید
if (array_key_exists("city", $student)) {
    echo "شهر: " . $student["city"] . PHP_EOL;
}

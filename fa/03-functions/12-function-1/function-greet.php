<?php
// تابعی برای سلام کردن به کاربر
function greet(string $name): void
{
    echo "سلام, " . $name . PHP_EOL;
}

// فراخوانی تابع
greet("Alice");

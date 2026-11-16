<?php
// گزینه‌های کوکی را پیش از شروع سشن تنظیم کنید
session_set_cookie_params([
    "httponly" => true,
    "samesite" => "Lax",
]);

// شروع سشن
session_start();

// ذخیرهٔ یک متغیر سشن
$_SESSION["username"] = "John";

echo "سشن ذخیره شد. حالا session-access.php را باز کنید.";

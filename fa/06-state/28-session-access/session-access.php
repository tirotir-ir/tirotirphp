<?php
session_start();

// خواندن متغیر سشن (با مقدار پیش‌فرض)
echo "نام کاربری: " . htmlspecialchars($_SESSION["username"] ?? "مهمان");

// خروج: داده را پاک و سپس سشن را نابود کنید
// $_SESSION = [];
// session_destroy();

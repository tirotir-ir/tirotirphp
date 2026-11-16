<?php
// کوکی باید پیش از هر خروجی ساخته شود
setcookie("theme", "dark", [
    "expires"  => time() + 60 * 60 * 24 * 30, // ۳۰ روز
    "path"     => "/",
    "httponly" => true,   // از جاوااسکریپت قابل خواندن نیست
    "samesite" => "Lax",  // ارسال بین‌سایتی را محدود می‌کند
    // "secure" => true,  // در سایت‌های HTTPS فعال کنید
]);

// کوکی تازه فقط در درخواست بعدی در $_COOKIE دیده می‌شود
$theme = $_COOKIE["theme"] ?? "light";
echo "تم فعلی: " . htmlspecialchars($theme);

// حذف کوکی: با زمان انقضای گذشته آن را بسازید
// setcookie("theme", "", time() - 3600, "/");

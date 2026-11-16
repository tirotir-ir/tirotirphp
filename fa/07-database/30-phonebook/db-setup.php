<?php
// با نام db-setup.php ذخیره شود. یک بار اجرایش کنید. به MySQL / MariaDB نیاز دارد (XAMPP، Laragon، Docker و ...).
// فقط برای توسعهٔ محلی: کاربر root با رمز خالی. در محیط واقعی از کاربر جداگانه و رمز قوی استفاده کنید.
$host = "localhost";
$user = "root";
$pass = "";

// mysqli به‌جای هشدار بی‌صدا استثنا پرتاب کند
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $pass);
    $conn->set_charset("utf8mb4");

    $conn->query("CREATE DATABASE IF NOT EXISTS phonebook_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $conn->select_db("phonebook_db");

    $conn->query("CREATE TABLE IF NOT EXISTS phonebook (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        phone_number VARCHAR(30) NOT NULL,
        email VARCHAR(150) NULL
    ) CHARACTER SET utf8mb4");

    echo "پایگاه داده و جدول آماده است." . PHP_EOL;
    $conn->close();
} catch (mysqli_sql_exception $e) {
    echo "خطای پایگاه داده: " . $e->getMessage() . PHP_EOL;
}

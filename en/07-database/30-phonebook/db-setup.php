<?php
// Saved as db-setup.php. Run it once. Needs MySQL / MariaDB (XAMPP, Laragon, Docker ...).
// Local development only: root with an empty password. Use a dedicated user and a strong password in production.
$host = "localhost";
$user = "root";
$pass = "";

// Make mysqli throw exceptions instead of silent warnings
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

    echo "Database and table are ready." . PHP_EOL;
    $conn->close();
} catch (mysqli_sql_exception $e) {
    echo "Database error: " . $e->getMessage() . PHP_EOL;
}

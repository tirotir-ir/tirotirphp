<?php
declare(strict_types=1);

// Local development only: root with an empty password. Use a dedicated user and a strong password in production.
$dsn  = "mysql:host=localhost;dbname=phonebook_db;charset=utf8mb4";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,   // throw exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,         // rows as associative arrays
        PDO::ATTR_EMULATE_PREPARES   => false,                    // real prepared statements
    ]);

    // Named parameter: the value never touches the SQL text
    $stmt = $pdo->prepare("SELECT * FROM phonebook WHERE name LIKE :name");
    $stmt->execute(["name" => "%Ali%"]);

    foreach ($stmt->fetchAll() as $row) {
        echo $row["name"] . " - " . $row["phone_number"] . PHP_EOL;
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage() . PHP_EOL;
}

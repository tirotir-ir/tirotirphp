<?php
// Saved as phonebook-insert.php. Pairs with phonebook-form.php.
// Local development only: root with an empty password. Use a dedicated user and a strong password in production.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Please use the form.");
}

$name  = trim($_POST["name"] ?? "");
$phone = trim($_POST["phone_number"] ?? "");
$email = trim($_POST["email"] ?? "");

if ($name === "" || $phone === "") {
    exit("Name and phone number are required.");
}

try {
    $conn = new mysqli("localhost", "root", "", "phonebook_db");
    $conn->set_charset("utf8mb4");

    // Prepared statement: protects against SQL injection. Store raw data, escape when printing.
    $stmt = $conn->prepare("INSERT INTO phonebook (name, phone_number, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $phone, $email);
    $stmt->execute();

    echo "Contact saved.";
    $stmt->close();
    $conn->close();
} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    echo "Could not save the contact.";
    // error_log($e->getMessage()); // log details, never show them to visitors
}

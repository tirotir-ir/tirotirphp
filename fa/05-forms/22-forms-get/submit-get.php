<?php
// با نام submit-get.php ذخیره شود. همراه form-get.php (در همان پوشه).
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["name"])) {
    $name = htmlspecialchars(trim($_GET["name"]), ENT_QUOTES, "UTF-8");

    echo "سلام, " . $name . "!";
} else {
    echo "داده‌ای ارسال نشده است.";
}

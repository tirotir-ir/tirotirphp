<?php
// با نام submit.php ذخیره شود. همراه form.php (در همان پوشه).
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"])) {
    // ورودی را پیش از چاپ trim و escape کنید
    $name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, "UTF-8");

    echo "سلام, " . $name . "!";
} else {
    echo "داده‌ای ارسال نشده است.";
}

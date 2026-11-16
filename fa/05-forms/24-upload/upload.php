<?php
// با نام upload.php ذخیره شود. همراه upload-form.php (در همان پوشه).
const UPLOAD_DIR = __DIR__ . "/uploads";
const MAX_SIZE = 2 * 1024 * 1024; // 2 MB
// فهرست مجاز: نوع واقعی فایل => پسوندی که خودمان انتخاب می‌کنیم
const ALLOWED = [
    "image/jpeg" => "jpg",
    "image/png" => "png",
    "application/pdf" => "pdf",
];

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_FILES["file"])) {
    http_response_code(400);
    exit("فایلی ارسال نشده است.");
}

$file = $_FILES["file"];

if ($file["error"] !== UPLOAD_ERR_OK) {
    exit("آپلود ناموفق بود. کد خطا: " . $file["error"]);
}
if ($file["size"] > MAX_SIZE) {
    exit("حجم فایل زیاد است.");
}

// به نوع و نام ارسالی مرورگر اعتماد نکنید: محتوای واقعی را بررسی کنید
$mime = (new finfo(FILEINFO_MIME_TYPE))->file($file["tmp_name"]);
if (!isset(ALLOWED[$mime])) {
    exit("این نوع فایل مجاز نیست.");
}

// نام تصادفی: بدون بازنویسی و بدون ترفند مسیر
$name = bin2hex(random_bytes(8)) . "." . ALLOWED[$mime];

if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

if (move_uploaded_file($file["tmp_name"], UPLOAD_DIR . "/" . $name)) {
    echo "آپلود شد با نام " . htmlspecialchars($name);
} else {
    echo "ذخیرهٔ فایل ممکن نشد.";
}

<?php
// Saved as upload.php. Pairs with upload-form.php (same folder).
const UPLOAD_DIR = __DIR__ . "/uploads";
const MAX_SIZE = 2 * 1024 * 1024; // 2 MB
// Allow-list: real MIME type => extension we choose ourselves
const ALLOWED = [
    "image/jpeg" => "jpg",
    "image/png" => "png",
    "application/pdf" => "pdf",
];

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_FILES["file"])) {
    http_response_code(400);
    exit("No file was sent.");
}

$file = $_FILES["file"];

if ($file["error"] !== UPLOAD_ERR_OK) {
    exit("Upload failed. Error code: " . $file["error"]);
}
if ($file["size"] > MAX_SIZE) {
    exit("The file is too large.");
}

// Never trust the browser-provided type or name: inspect the real content
$mime = (new finfo(FILEINFO_MIME_TYPE))->file($file["tmp_name"]);
if (!isset(ALLOWED[$mime])) {
    exit("This file type is not allowed.");
}

// Random name: no overwriting, no path tricks
$name = bin2hex(random_bytes(8)) . "." . ALLOWED[$mime];

if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

if (move_uploaded_file($file["tmp_name"], UPLOAD_DIR . "/" . $name)) {
    echo "Uploaded as " . htmlspecialchars($name);
} else {
    echo "Could not save the file.";
}

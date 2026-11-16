<?php
// با نام header.php ذخیره شود. توسط index.php فراخوانی می‌شود.
$siteName = "وب‌سایت من";
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($siteName) ?></title>
</head>
<body>
<header>
    <h1><?= htmlspecialchars($siteName) ?></h1>
    <hr>
</header>

<?php
// Saved as header.php. Included by index.php.
$siteName = "My Website";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($siteName) ?></title>
</head>
<body>
<header>
    <h1><?= htmlspecialchars($siteName) ?></h1>
    <hr>
</header>

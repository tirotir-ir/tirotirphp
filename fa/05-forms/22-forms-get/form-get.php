<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ارسال نام (GET)</title>
</head>
<body>
    <!-- با نام form-get.php ذخیره شود. همراه submit-get.php (در همان پوشه). -->
    <form method="get" action="submit-get.php">
        <label>نام: <input type="text" name="name" required></label>
        <input type="submit" value="ارسال">
    </form>
</body>
</html>

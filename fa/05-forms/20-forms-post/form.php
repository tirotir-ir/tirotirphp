<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نام خود را ارسال کنید</title>
</head>
<body>
    <!-- با نام form.php ذخیره شود. همراه submit.php (در همان پوشه). -->
    <form method="post" action="submit.php">
        <label>نام: <input type="text" name="name" required></label>
        <input type="submit" value="ارسال">
    </form>
</body>
</html>

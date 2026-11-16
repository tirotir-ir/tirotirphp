<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>فرم ثبت مخاطب</title>
</head>
<body>
    <!-- با نام phonebook-form.php ذخیره شود. همراه phonebook-insert.php. -->
    <h1>فرم ثبت مخاطب</h1>
    <form method="post" action="phonebook-insert.php">
        <label>نام: <input type="text" name="name" required></label><br>
        <label>شمارهٔ تلفن: <input type="text" name="phone_number" required></label><br>
        <label>ایمیل: <input type="email" name="email"></label><br>
        <input type="submit" value="ارسال">
    </form>
    <p><a href="phonebook-list.php">مشاهدهٔ دفترچه تلفن</a></p>
</body>
</html>

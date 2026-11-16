<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>آپلود فایل</title>
</head>
<body>
    <!-- با نام upload-form.php ذخیره شود. همراه upload.php (در همان پوشه). -->
    <form method="post" enctype="multipart/form-data" action="upload.php">
        <label>فایل را انتخاب کنید (JPG یا PNG یا PDF، حداکثر ۲ مگابایت):
            <input type="file" name="file" required>
        </label>
        <input type="submit" value="آپلود">
    </form>
</body>
</html>

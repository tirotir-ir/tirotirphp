<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>سلام</title>
</head>
<body>
    <form method="post" action="">
        <label>نام خود را وارد کنید: <input type="text" name="name" required></label>
        <input type="submit" value="ارسال">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // ورودی کاربر را هنگام چاپ escape کنید: این کار از XSS جلوگیری می‌کند
        $name = htmlspecialchars($_POST["name"] ?? "", ENT_QUOTES, "UTF-8");

        echo "سلام, " . $name . "!";
    }
    ?>
</body>
</html>

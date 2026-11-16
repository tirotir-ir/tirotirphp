<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>روز هفته</title>
</head>
<body>
    <form method="post" action="">
        <label>عددی بین ۱ تا ۷ برای روز هفته وارد کنید:
            <input type="number" name="day" min="1" max="7" required>
        </label>
        <input type="submit" value="ارسال">
    </form>

    <?php
    // بررسی ارسال شدن فرم
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // خواندن عدد و اطمینان از صحیح بودن آن
        $day = (int) ($_POST["day"] ?? 0);

        switch ($day) {
            case 1: echo "دوشنبه"; break;
            case 2: echo "سه‌شنبه"; break;
            case 3: echo "چهارشنبه"; break;
            case 4: echo "پنجشنبه"; break;
            case 5: echo "جمعه"; break;
            case 6: echo "شنبه"; break;
            case 7: echo "یکشنبه"; break;
            default: echo "شمارهٔ روز نامعتبر است";
        }
    }
    ?>
</body>
</html>

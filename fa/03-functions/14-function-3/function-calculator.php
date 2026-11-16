<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ماشین‌حساب</title>
</head>
<body>
    <form method="post" action="">
        <label>عدد اول: <input type="number" name="num1" step="0.01" required></label><br>
        <label>عدد دوم: <input type="number" name="num2" step="0.01" required></label><br>
        <input type="submit" value="محاسبه">
    </form>

    <?php
    // محاسبهٔ مجموع (برای عملیات دیگر + را به - * / تغییر دهید)
    function calculate(float $num1, float $num2): float
    {
        return $num1 + $num2;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $num1 = (float) ($_POST["num1"] ?? 0);
        $num2 = (float) ($_POST["num2"] ?? 0);

        echo "مجموع $num1 و $num2 برابر است با: " . calculate($num1, $num2);
    }
    ?>
</body>
</html>

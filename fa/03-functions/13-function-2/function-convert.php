<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تبدیل کیلوگرم به گرم</title>
</head>
<body>
    <form method="post" action="">
        <label>وزن را به کیلوگرم وارد کنید:
            <input type="number" name="kg" step="0.01" required>
        </label>
        <input type="submit" value="تبدیل به گرم">
    </form>

    <?php
    // تابع تبدیل کیلوگرم به گرم
    function kgToG(float $kg): float
    {
        // 1 kg = 1000 g
        return $kg * 1000;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $kg = (float) ($_POST["kg"] ?? 0);
        echo $kg . " کیلوگرم برابر است با " . kgToG($kg) . " گرم.";
    }
    ?>
</body>
</html>

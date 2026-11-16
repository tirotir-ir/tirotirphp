<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculator</title>
</head>
<body>
    <form method="post" action="">
        <label>First number: <input type="number" name="num1" step="0.01" required></label><br>
        <label>Second number: <input type="number" name="num2" step="0.01" required></label><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    // Calculate the sum (change + to - * / for other operations)
    function calculate(float $num1, float $num2): float
    {
        return $num1 + $num2;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $num1 = (float) ($_POST["num1"] ?? 0);
        $num2 = (float) ($_POST["num2"] ?? 0);

        echo "The sum of $num1 and $num2 is: " . calculate($num1, $num2);
    }
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Convert kilograms to grams</title>
</head>
<body>
    <form method="post" action="">
        <label>Enter weight in kilograms:
            <input type="number" name="kg" step="0.01" required>
        </label>
        <input type="submit" value="Convert to grams">
    </form>

    <?php
    // Function to convert kg to g
    function kgToG(float $kg): float
    {
        // 1 kg = 1000 g
        return $kg * 1000;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $kg = (float) ($_POST["kg"] ?? 0);
        echo $kg . " kg is equal to " . kgToG($kg) . " grams.";
    }
    ?>
</body>
</html>

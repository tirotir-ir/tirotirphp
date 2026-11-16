<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Day of the week</title>
</head>
<body>
    <form method="post" action="">
        <label>Enter a number (1-7) for the day of the week:
            <input type="number" name="day" min="1" max="7" required>
        </label>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Read the number and make sure it is an integer
        $day = (int) ($_POST["day"] ?? 0);

        switch ($day) {
            case 1: echo "Monday"; break;
            case 2: echo "Tuesday"; break;
            case 3: echo "Wednesday"; break;
            case 4: echo "Thursday"; break;
            case 5: echo "Friday"; break;
            case 6: echo "Saturday"; break;
            case 7: echo "Sunday"; break;
            default: echo "Invalid day number";
        }
    }
    ?>
</body>
</html>

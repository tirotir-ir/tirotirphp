<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Greeting</title>
</head>
<body>
    <form method="post" action="">
        <label>Enter your name: <input type="text" name="name" required></label>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Escape user input when printing it: this prevents XSS
        $name = htmlspecialchars($_POST["name"] ?? "", ENT_QUOTES, "UTF-8");

        echo "Hello, " . $name . "!";
    }
    ?>
</body>
</html>

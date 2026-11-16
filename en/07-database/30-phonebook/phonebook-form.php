<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phonebook entry form</title>
</head>
<body>
    <!-- Saved as phonebook-form.php. Pairs with phonebook-insert.php. -->
    <h1>Phonebook entry form</h1>
    <form method="post" action="phonebook-insert.php">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Phone number: <input type="text" name="phone_number" required></label><br>
        <label>Email: <input type="email" name="email"></label><br>
        <input type="submit" value="Submit">
    </form>
    <p><a href="phonebook-list.php">View the phonebook</a></p>
</body>
</html>

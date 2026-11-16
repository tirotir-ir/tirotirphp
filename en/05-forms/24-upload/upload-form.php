<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload a file</title>
</head>
<body>
    <!-- Saved as upload-form.php. Pairs with upload.php (same folder). -->
    <form method="post" enctype="multipart/form-data" action="upload.php">
        <label>Select a file (JPG, PNG or PDF, max 2 MB):
            <input type="file" name="file" required>
        </label>
        <input type="submit" value="Upload">
    </form>
</body>
</html>

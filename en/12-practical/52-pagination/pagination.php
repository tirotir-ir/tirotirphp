<?php
declare(strict_types=1);

// Demo list. With SQL use LIMIT and OFFSET instead of array_slice.
$items = range(1, 95);

$perPage = 10;
$total   = count($items);
$pages   = max(1, (int) ceil($total / $perPage));

// Clamp the requested page into the valid range
$current = min(max(1, (int) ($_GET["page"] ?? 1)), $pages);
$visible = array_slice($items, ($current - 1) * $perPage, $perPage);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagination</title>
</head>
<body>
    <ul>
        <?php foreach ($visible as $item): ?>
            <li>Item <?= $item ?></li>
        <?php endforeach; ?>
    </ul>

    <p>
        <?php if ($current > 1): ?>
            <a href="?page=<?= $current - 1 ?>">Previous</a>
        <?php endif; ?>
        Page <?= $current ?> of <?= $pages ?>
        <?php if ($current < $pages): ?>
            <a href="?page=<?= $current + 1 ?>">Next</a>
        <?php endif; ?>
    </p>
</body>
</html>

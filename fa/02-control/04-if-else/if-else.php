<?php
// بررسی مثبت، منفی یا صفر بودن یک عدد
$number = -1;

if ($number > 0) {
    echo "عدد مثبت";
} elseif ($number < 0) {
    echo "عدد منفی";
} else {
    echo "صفر";
}
echo PHP_EOL;

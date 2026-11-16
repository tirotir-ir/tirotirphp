<?php
declare(strict_types=1);

mb_internal_encoding("UTF-8");

$text = "سلام دنیا";

// strlen counts bytes, mb_strlen counts characters
echo "strlen:    " . strlen($text) . PHP_EOL;
echo "mb_strlen: " . mb_strlen($text) . PHP_EOL;

// Substring, position and splitting by characters
echo mb_substr($text, 0, 4) . PHP_EOL;
echo mb_strpos($text, "دنیا") . PHP_EOL;
echo implode("-", mb_str_split("سلام")) . PHP_EOL;

// Reverse a Unicode string correctly
echo implode("", array_reverse(mb_str_split($text))) . PHP_EOL;

// Case conversion also works for non-English letters
echo mb_strtoupper("straße café") . PHP_EOL;

// Remember: the file, the database (utf8mb4) and the HTML (<meta charset="UTF-8">) must all be UTF-8

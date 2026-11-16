<?php
declare(strict_types=1);

// Test a pattern (an Iranian mobile number: 09 followed by 9 digits)
var_dump(preg_match("/^09[0-9]{9}$/", "09121234567"));

// Named groups capture parts of the match
if (preg_match("/(?<year>[0-9]{4})-(?<month>[0-9]{2})-(?<day>[0-9]{2})/", "Date: 2026-11-04", $m)) {
    echo $m["year"] . " / " . $m["month"] . " / " . $m["day"] . PHP_EOL;
}

// Find every match
preg_match_all("/#[a-z0-9_]+/i", "I love #php and #web_dev", $tags);
print_r($tags[0]);

// Replace with a callback
echo preg_replace_callback("/[0-9]+/", fn(array $x): string => (string) ((int) $x[0] * 2), "a1 b22 c3") . PHP_EOL;

// The /u flag makes the pattern Unicode-aware (needed for Persian)
echo preg_match_all("/[آ-ی]+/u", "سلام hello دنیا") . PHP_EOL;

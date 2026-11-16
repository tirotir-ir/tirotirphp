<?php
declare(strict_types=1);

// Needs the intl extension (enable extension=intl in php.ini)
if (!class_exists(IntlDateFormatter::class)) {
    exit("The intl extension is not enabled." . PHP_EOL);
}

$now = new DateTimeImmutable("now", new DateTimeZone("Asia/Tehran"));

// Persian digits and month names
$fa = new IntlDateFormatter(
    "fa_IR@calendar=persian",
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    "Asia/Tehran",
    IntlDateFormatter::TRADITIONAL,
    "EEEE d MMMM y"
);
echo $fa->format($now) . PHP_EOL;

// Latin digits, numeric format
$numeric = new IntlDateFormatter(
    "fa_IR@calendar=persian;numbers=latn",
    IntlDateFormatter::NONE,
    IntlDateFormatter::NONE,
    "Asia/Tehran",
    IntlDateFormatter::TRADITIONAL,
    "yyyy/MM/dd"
);
echo $numeric->format($now) . PHP_EOL;

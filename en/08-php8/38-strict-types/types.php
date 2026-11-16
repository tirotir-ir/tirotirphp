<?php
// Must be the very first statement of the file
declare(strict_types=1);

// Parameter types, return type, union type and nullable type
function format(int|float $amount, ?string $currency = null): string
{
    return number_format($amount, 2) . ($currency !== null ? " $currency" : "");
}

echo format(1234.5, "USD") . PHP_EOL;
echo format(10) . PHP_EOL;

// With strict_types, "5" (a string) is not silently converted to a number
try {
    echo format("5");
} catch (TypeError $e) {
    echo "TypeError: " . $e->getMessage() . PHP_EOL;
}

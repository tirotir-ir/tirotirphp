<?php
declare(strict_types=1);

// A custom exception gives errors a meaningful name
class NegativeNumberException extends InvalidArgumentException
{
}

function safeSqrt(float $n): float
{
    if ($n < 0) {
        throw new NegativeNumberException("Cannot take the square root of $n");
    }
    return sqrt($n);
}

foreach ([16, -4, 0] as $value) {
    try {
        echo "sqrt($value) = " . safeSqrt($value) . PHP_EOL;
    } catch (NegativeNumberException $e) {
        echo "Input error: " . $e->getMessage() . PHP_EOL;
    } catch (Throwable $e) {
        // Last resort: catches any other error or exception
        echo "Unexpected: " . $e->getMessage() . PHP_EOL;
    } finally {
        // Always runs, with or without an error
        echo "-- done" . PHP_EOL;
    }
}

// Integer division by zero throws DivisionByZeroError
try {
    echo intdiv(10, 0);
} catch (DivisionByZeroError $e) {
    echo $e->getMessage() . PHP_EOL;
}

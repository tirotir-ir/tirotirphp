<?php
declare(strict_types=1);

namespace App;

// File path src/Greeter.php must match the class App\Greeter (PSR-4)
final class Greeter
{
    public function greet(string $name): string
    {
        return "Hello, " . $name . "!";
    }
}

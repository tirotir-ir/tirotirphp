<?php
declare(strict_types=1);

// Created by: composer install (or composer dump-autoload)
require __DIR__ . "/vendor/autoload.php";

use App\Greeter;

$greeter = new Greeter();
echo $greeter->greet("PHP") . PHP_EOL;

<?php
declare(strict_types=1);

interface Shape
{
    public function area(): float;
    public function name(): string;
}

abstract class BaseShape implements Shape
{
    public function describe(): string
    {
        return sprintf("%s: %.2f", $this->name(), $this->area());
    }
}

final class Circle extends BaseShape
{
    public function __construct(private float $radius)
    {
    }

    public function area(): float
    {
        return M_PI * $this->radius ** 2;
    }

    public function name(): string
    {
        return "Circle";
    }
}

final class Rectangle extends BaseShape
{
    public function __construct(private float $width, private float $height)
    {
    }

    public function area(): float
    {
        return $this->width * $this->height;
    }

    public function name(): string
    {
        return "Rectangle";
    }
}

// Polymorphism: the loop does not care which concrete class it gets
$shapes = [new Circle(2), new Rectangle(3, 4)];
foreach ($shapes as $shape) {
    echo $shape->describe() . PHP_EOL;
}

<?php
declare(strict_types=1);

final class Category
{
    // Constructor promotion: declare and assign properties in one place
    public function __construct(public readonly string $title)
    {
    }
}

final class Product
{
    public function __construct(
        public readonly string $name,
        public readonly float $price,
        public readonly ?Category $category = null,
    ) {
    }

    // readonly objects are changed by creating a modified copy
    public function withPrice(float $price): static
    {
        return new static($this->name, $price, $this->category);
    }
}

// Named arguments: order does not matter, skipped ones use defaults
$book = new Product(price: 12.5, name: "Book");

// Nullsafe operator: stops and returns null if the left side is null
echo ($book->category?->title ?? "no category") . PHP_EOL;

$sale = $book->withPrice(9.9);
echo $sale->name . ": " . $sale->price . PHP_EOL;

try {
    $book->price = 1.0; // not allowed
} catch (Error $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}

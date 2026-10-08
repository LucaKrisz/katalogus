<?php

declare(strict_types=1);

use App\Category;
use App\Product;

require __DIR__ . '/../vendor/autoload.php';

$mug = new Product(1, 'Kézműves bögre', 4500, Category::Ceramics);

echo "{$mug->name}: {$mug->formattedPrice()} ({$mug->category->value})" . PHP_EOL;

try {
    $mug->priceHuf = 3000;
} catch (Error $e) {
    echo 'Readonly: ' . $e->getMessage() . PHP_EOL;
}

try {
    new Product(2, 'Akácméz', -100, Category::Food);
} catch (InvalidArgumentException $e) {
    echo 'Validation: ' . $e->getMessage() . PHP_EOL;
}
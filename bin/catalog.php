<?php
declare(strict_types=1);
use App\Category;
use App\ProductRepository;

require __DIR__ . '/../vendor/autoload.php';
$repository = new ProductRepository(__DIR__ . '/../data/products.json');

echo "Összes termék:" . count($repository->all()) . PHP_EOL;

foreach($repository->findByCategory(Category::Ceramics) as $product){
    echo "-{$product->name} ({$product->category->label()}): {$product->formattedPrice()}" . PHP_EOL;
}
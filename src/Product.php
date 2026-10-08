<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

final readonly class Product
{
    public function __construct(
        public int $id,
        public string $name,
        public int $priceHuf,
        public Category $category,
    ) {
        if ($priceHuf < 0) {
            throw new InvalidArgumentException('Price cannot be negative.');
        }
    }

    public function formattedPrice(): string
    {
        return number_format($this->priceHuf, 0, ',', ' ') . ' Ft';
    }
}
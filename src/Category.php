<?php

declare(strict_types=1);

namespace App;

enum Category: string
{
    case Ceramics = 'ceramics';
    case Food = 'food';
    case Textile ='textile';
    public function label(): string
    {
        return match ($this) {
            self::Ceramics => 'Kézműves kerámia',
            self::Food => 'Élelmiszer',
            self::Textile => 'Textil',
        };
    }
}
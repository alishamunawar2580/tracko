<?php

namespace App\Domain\Master\Product\Events;

use App\Domain\Master\Product\Models\Product;
use Illuminate\Foundation\Events\Dispatchable;

class ProductCreated
{
    use Dispatchable;

    public function __construct(
        public Product $product
    ) {}
}

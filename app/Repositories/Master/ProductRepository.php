<?php

namespace App\Repositories\Master;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function model(): string
    {
        return Product::class;
    }
}

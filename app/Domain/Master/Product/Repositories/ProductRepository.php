<?php

namespace App\Domain\Master\Product\Repositories;

use App\Domain\Master\Product\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function find(int $id)
    {
        return Product::findOrFail($id);
    }

    public function all()
    {
        return Product::all();
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(int $id, array $data)
    {
        $product = $this->find($id);
        $product->update($data);
        return $product;
    }

    public function delete(int $id)
    {
        return Product::destroy($id);
    }
}

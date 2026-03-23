<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    public function __construct(
        private ProductRepository $productRepository
    ) {}

    public function create(array $data)
    {
        $margin = 0;
        $purchasePrice = $data['purchase_price'] ?? 0;
        $sellingPrice = $data['selling_price'] ?? 0;

        if ($purchasePrice > 0) {
            $margin = (($sellingPrice - $purchasePrice) / $purchasePrice) * 100;
        }

        return $this->productRepository->create(array_merge($data, ['margin' => $margin]));
    }

    public function all()
    {
        return $this->productRepository->all();
    }

    public function find(int $id)
    {
        return $this->productRepository->findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        if (isset($data['purchase_price']) || isset($data['selling_price'])) {
            $product = $this->productRepository->findOrFail($id);
            $purchasePrice = $data['purchase_price'] ?? $product->purchase_price;
            $sellingPrice = $data['selling_price'] ?? $product->selling_price;

            $data['margin'] = $purchasePrice > 0
                ? (($sellingPrice - $purchasePrice) / $purchasePrice) * 100
                : 0;
        }

        return $this->productRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->productRepository->delete($id);
    }
}

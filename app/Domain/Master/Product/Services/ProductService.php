<?php

namespace App\Domain\Master\Product\Services;

use App\Domain\Master\Product\DTOs\ProductDTO;
use App\Domain\Master\Product\Actions\CreateProductAction;
use App\Domain\Master\Product\Repositories\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private CreateProductAction $createProductAction
    ) {}

    public function create(array $data)
    {
        $dto = ProductDTO::fromArray($data);
        return $this->createProductAction->execute($dto);
    }
}

<?php

namespace App\Domain\Master\Product\Actions;

use App\Domain\Master\Product\DTOs\ProductDTO;
use App\Domain\Master\Product\Repositories\ProductRepositoryInterface;
use App\Domain\Master\Product\Events\ProductCreated;

class CreateProductAction
{
    public function __construct(
        private ProductRepositoryInterface $repository,
        private CalculateProfitMarginAction $calculateMargin
    ) {}

    public function execute(ProductDTO $dto)
    {
        $margin = $this->calculateMargin->execute(
            $dto->purchasePrice,
            $dto->sellingPrice
        );

        $product = $this->repository->create([
            'organization_id' => $dto->organizationId,
            'name' => $dto->name,
            'sku' => $dto->sku,
            'category' => $dto->category,
            'unit' => $dto->unit,
            'description' => $dto->description,
            'purchase_price' => $dto->purchasePrice,
            'selling_price' => $dto->sellingPrice,
            'margin' => $margin,
            'stock' => $dto->stock,
            'min_stock' => $dto->minStock,
            'supplier_id' => $dto->supplierId,
            'supplier_name' => $dto->supplierName,
            'tax_rate' => $dto->taxRate,
            'barcode' => $dto->barcode,
            'hsn_code' => $dto->hsnCode,
            'status' => $dto->status,
            'featured' => $dto->featured,
            'track_stock' => $dto->trackStock,
            'allow_backorder' => $dto->allowBackorder,
        ]);

        event(new ProductCreated($product));

        return $product;
    }
}

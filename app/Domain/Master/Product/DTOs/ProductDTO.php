<?php

namespace App\Domain\Master\Product\DTOs;

class ProductDTO
{
    public function __construct(
        public readonly int $organizationId,
        public readonly string $name,
        public readonly string $sku,
        public readonly string $category,
        public readonly string $unit,
        public readonly float $purchasePrice,
        public readonly float $sellingPrice,
        public readonly int $stock,
        public readonly ?string $description = null,
        public readonly ?int $minStock = null,
        public readonly ?int $supplierId = null,
        public readonly ?string $supplierName = null,
        public readonly ?float $taxRate = null,
        public readonly ?string $barcode = null,
        public readonly ?string $hsnCode = null,
        public readonly string $status = 'active',
        public readonly bool $featured = true,
        public readonly bool $trackStock = true,
        public readonly bool $allowBackorder = true,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            organizationId: $data['organization_id'],
            name: $data['name'],
            sku: $data['sku'],
            category: $data['category'],
            unit: $data['unit'],
            purchasePrice: $data['purchase_price'],
            sellingPrice: $data['selling_price'],
            stock: $data['stock'],
            description: $data['description'] ?? null,
            minStock: $data['min_stock'] ?? null,
            supplierId: $data['supplier_id'] ?? null,
            supplierName: $data['supplier_name'] ?? null,
            taxRate: $data['tax_rate'] ?? null,
            barcode: $data['barcode'] ?? null,
            hsnCode: $data['hsn_code'] ?? null,
            status: $data['status'] ?? 'active',
            featured: $data['featured'] ?? true,
            trackStock: $data['track_stock'] ?? true,
            allowBackorder: $data['allow_backorder'] ?? true,
        );
    }
}

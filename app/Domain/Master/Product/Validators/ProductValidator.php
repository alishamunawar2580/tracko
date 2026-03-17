<?php

namespace App\Domain\Master\Product\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProductValidator
{
    public function validate(array $data): array
    {
        $validator = Validator::make($data, [
            'organization_id' => 'required|integer|exists:organizations,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|string|unique:products,sku',
            'category' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'description' => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'min_stock' => 'nullable|integer|min:0',
            'supplier_id' => 'nullable|integer',
            'supplier_name' => 'nullable|string|max:255',
            'tax_rate' => 'nullable|numeric|min:0|max:100',
            'barcode' => 'nullable|string|max:255',
            'hsn_code' => 'nullable|string|max:255',
            'status' => 'in:active,inactive',
            'featured' => 'boolean',
            'track_stock' => 'boolean',
            'allow_backorder' => 'boolean',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return $validator->validated();
    }
}

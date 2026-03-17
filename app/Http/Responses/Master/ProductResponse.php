<?php

namespace App\Http\Responses\Master;

use App\Http\Responses\BaseResponse;
use Illuminate\Http\JsonResponse;

class ProductResponse extends BaseResponse
{
    protected static string $module = 'products';

    public function productCreated($product)
    {
        return parent::created($product, static::getMessage('created_successfully'));
    }

    public function productUpdated($product)
    {
        return parent::updated($product, static::getMessage('updated_successfully'));
    }

    public function productDeleted()
    {
        return parent::deleted(static::getMessage('deleted_successfully'));
    }

    public function productNotFound()
    {
        return parent::notFound(static::getMessage('not_found'));
    }

    public function productsListed($products)
    {
        $filteredProducts = $products->map(function($product) {
            return self::filterProductData($product);
        });
        return parent::collection($filteredProducts, static::getMessage('retrieved_successfully'));
    }

    private static function filterProductData($product): array
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'status' => $product->status,
            'created_at' => $product->created_at->format('Y-m-d H:i:s')  
        ];
    }
}
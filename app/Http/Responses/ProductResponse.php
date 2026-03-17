<?php

namespace App\Http\Responses;

class ProductResponse extends BaseResponse
{
    protected static string $module = 'products';

    public static function productCreated($product)
    {
        return parent::created($product, static::getMessage('created_successfully'));
    }

    public static function productUpdated($product)
    {
        return parent::updated($product, static::getMessage('updated_successfully'));
    }

    public static function productDeleted()
    {
        return parent::deleted(static::getMessage('deleted_successfully'));
    }

    public static function productNotFound()
    {
        return parent::notFound(static::getMessage('not_found'));
    }

    public static function productsListed($products)
    {
        return parent::collection($products, static::getMessage('retrieved_successfully'));
    }
}
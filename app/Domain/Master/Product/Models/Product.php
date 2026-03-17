<?php
namespace App\Domain\Master\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'organization_id', 'name', 'sku', 'category', 'unit', 'description',
        'purchase_price', 'selling_price', 'margin', 'stock', 'min_stock',
        'supplier_id', 'supplier_name', 'tax_rate', 'barcode', 'hsn_code',
        'status', 'featured', 'track_stock', 'allow_backorder'
    ];

    protected $casts = [
        'purchase_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'margin' => 'decimal:2',
        'tax_rate' => 'decimal:2',
        'featured' => 'boolean',
        'track_stock' => 'boolean',
        'allow_backorder' => 'boolean',
    ];
}

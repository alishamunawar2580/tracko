<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = [
        'daily_sale_id', 'organization_id', 'product_id', 'nozzle_id', 'dispenser_id',
        'customer_id', 'product_name', 'opening_meter', 'closing_meter',
        'quantity', 'unit_price', 'amount', 'payment_type',
    ];

    public function dailySale()
    {
        return $this->belongsTo(DailySale::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

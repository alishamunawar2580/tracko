<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailySale extends Model
{
    protected $fillable = [
        'organization_id', 'sale_date', 'shift', 'total_fuel_amount', 'total_product_amount',
        'total_amount', 'cash_amount', 'credit_amount', 'digital_amount',
        'notes', 'status', 'closed_by', 'closed_at',
    ];

    protected $casts = [
        'sale_date' => 'date',
        'closed_at' => 'datetime',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function closedBy()
    {
        return $this->belongsTo(User::class, 'closed_by');
    }
}

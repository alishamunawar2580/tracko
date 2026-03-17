<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'organization_id', 'supplier_id', 'purchase_date', 'invoice_no', 'vehicle_no',
        'total_amount', 'paid_amount', 'balance_amount', 'notes', 'status',
    ];

    protected $casts = [
        'purchase_date' => 'date',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function items()
    {
        return $this->hasMany(PurchaseItem::class);
    }
}

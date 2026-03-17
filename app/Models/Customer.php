<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'organization_id', 'name', 'phone', 'email', 'address',
        'type', 'company_name', 'ntn', 'credit_limit', 'current_balance', 'status',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}

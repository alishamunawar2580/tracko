<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyAccount extends Model
{
    protected $fillable = [
        'organization_id', 'account_date', 'opening_balance', 'total_sales',
        'total_purchases', 'total_expenses', 'total_receipts', 'closing_balance',
        'notes', 'status', 'created_by',
    ];

    protected $casts = [
        'account_date' => 'date',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

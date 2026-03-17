<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'organization_id', 'name', 'contact_person', 'phone', 'email',
        'address', 'ntn', 'company_name', 'opening_balance', 'current_balance', 'status',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}

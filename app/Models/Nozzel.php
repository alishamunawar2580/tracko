<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nozzel extends Model
{
    protected $fillable = [
        'nozzle_name',
        'nozzle_id',
        'status',
        'product_id',
        'user_id',
        'dispenser_id',
        'tank_id',
    ];
    public function prduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function tank()
    {
        return $this->belongsTo(Tank::class, 'tank_id', 'id');
    }
    public function dispenser()
    {
        return $this->belongsTo(Dispensers::class, 'dispenser_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
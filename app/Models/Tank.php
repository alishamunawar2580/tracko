<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    protected $fillable = ['tank_name','tank_id','product_id','current_stock','tank_capacity','status'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function nozzel()
    {
        return $this->hasMany(Nozzel::class);
    }
}

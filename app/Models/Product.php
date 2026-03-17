<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_id','product_name','price_per_litre','active_status','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tank(){
        return $this->hasMany(Tank::class);
    }
    public function nozzel(){
        return $this->hasMany(Nozzel::class);
    }

    
}

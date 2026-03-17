<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispensers extends Model
{
    protected $fillable  = ['despenser_name','dispenser_id','dispensers_name','no_of_nozzles','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function nozzles()
    {
        return $this->hasMany(Nozzel::class);
    }
}
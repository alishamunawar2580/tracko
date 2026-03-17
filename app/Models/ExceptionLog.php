<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExceptionLog extends Model
{
    protected $fillable = [
        'error_id',
        'message',
        'file',
        'line',
        'trace',
        'context',
        'controller'
    ];
}
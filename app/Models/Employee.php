<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'organization_id', 'name', 'employee_code', 'designation', 'department',
        'phone', 'email', 'address', 'cnic', 'basic_salary', 'join_date', 'status',
    ];

    protected $casts = [
        'join_date' => 'date',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}

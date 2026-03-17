<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'organization_id', 'employee_id', 'month', 'year',
        'basic_salary', 'allowances', 'deductions', 'net_salary',
        'paid_date', 'status', 'notes',
    ];

    protected $casts = [
        'paid_date' => 'date',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

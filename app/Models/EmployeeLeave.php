<?php

namespace App\Models;

use App\Enums\LeaveRequestStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeLeave extends Pivot
{
    use HasFactory;

    protected $table = 'employee_leave';
    public $timestamps = false;
    protected $fillable = ['employee_id', 'leave_id', 'status', 'deny_reason', 'start_date', 'days', 'created_at'];


    protected $casts = [
        'created_at' => 'date',
        'start_date' => 'date:Y-m-d',
        'status' => LeaveRequestStatus::class,
    ];

    protected static function booted()
    {
//        static::creating(function (EmployeeLeave $employeeLeave) {
//            $employeeLeave->created_at = now();
//        });
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    public function leave()
    {
        return $this->belongsTo(Leave::class);
    }
}

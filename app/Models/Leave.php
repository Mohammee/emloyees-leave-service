<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function employees()
    {
        return $this->belongsToMany(Employee::class)
            ->withPivot(['start_date', 'days', 'status', 'deny_reason'])
            ->using(EmployeeLeave::class);
    }
}

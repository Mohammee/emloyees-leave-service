<?php

namespace App\Models;

use App\Enums\UserStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'salary', 'job', 'status', 'image', 'birthday', 'joined_at'];
//    protected $with = ['leaves'];

    protected $hidden = ['password',];


    protected $casts = [
        'status' => UserStatus::class,
        'joined_at' => 'date',
        'birthday' => 'date:Y-m-d',
        'password' => 'hashed',
        'email_verified_at' => 'datetime',
    ];

    public function getImageUrlAttribute()
    {
        $image = $this->image;

        if ($image && Storage::exists($image)) {
            return Storage::url($image);
        }

        return asset('uploads/default.jpg');
    }

    public function password(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                if (!$value && $this->exists) {
                    return $this->attributes['password'];
                }
                return bcrypt($value);
            }
        );
    }

    public function leaves()
    {
        return $this->belongsToMany(
            Leave::class,
            'employee_leave',
            'employee_id',
            'leave_id',
            'id',
            'id'
        )->withPivot(['status', 'deny_reason', 'start_date', 'days'])
            ->using(EmployeeLeave::class);
    }

}

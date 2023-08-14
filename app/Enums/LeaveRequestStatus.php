<?php

namespace App\Enums;

enum LeaveRequestStatus: string
{

    case APPROVED = 'approved';
    case DENY = 'deny';
    case PENDING = 'pending';

    public function getColor()
    {
        return match ($this) {
            static::APPROVED => 'blue',
            static::PENDING => 'green',
            static::DENY => 'red'
        };
    }
}

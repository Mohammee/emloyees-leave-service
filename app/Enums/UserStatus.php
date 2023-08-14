<?php

namespace App\Enums;

enum UserStatus: string
{

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';

    public function getColor()
    {
        return match ($this) {
            static::ACTIVE => 'green',
            static::INACTIVE => 'red',
        };
    }
}

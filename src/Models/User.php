<?php

namespace Analyzen\Auth\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'cv_link',
        'status',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getStatusAttribute($value): bool
    {
        if ($value == self::STATUS_ACTIVE) {
            return true;
        }

        return false;
    }

    protected static function newFactory()
    {
        return \Analyzen\Auth\Database\Factories\UserFactory::new();
    }
}

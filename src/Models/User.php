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
        'cv_link',
        //'status', //not mass fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

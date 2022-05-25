<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Uuid;

    protected $keyType      = 'string';
    public $incrementing    = false;
    protected $guarded      = [];
    protected $uuidVersion  = 5;


    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'employee_id',
        'mobile',
        'role_type',
        'username',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

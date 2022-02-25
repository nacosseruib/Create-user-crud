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
        'username',
        'email',
        'password',
        'status',
        'suspended',
        'last_login',
        'current_login',
        'user_token',
        'social_id',
        'social_type'
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


// $table->increments('id');
// $table->string('name', 32);
// $table->string('username', 32);
// $table->string('email', 320);
// $table->string('password', 64);
// $table->string('role', 32);
// $table->string('confirmation_code');
// $table->boolean('confirmed')->default(true);
// $table->timestamps();

// $table->unique('email', 'users_email_uniq');

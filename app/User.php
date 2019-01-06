<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * user's flyer relationship (1 to many)
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flyers()
    {
        return $this->hasMany(Flyer::class);
    }

    public function owns(Flyer $flyer)
    {
        return $this->id == $flyer->user_id;
    }
}

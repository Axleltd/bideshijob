<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,ShinobiTrait;    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','password','email_activated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $table='users';

    public function company()
    {
        return $this->hasMany('\App\Company');
    }

    public function post()
    {
        return $this->hasMany('\App\Post');
    }

    public function profile()
    {
        return $this->hasOne('\App\Profile');
    }
}

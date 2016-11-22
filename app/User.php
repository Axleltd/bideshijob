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
    // public function routeNotificationForSlack()
    // {
    //     return "https://hooks.slack.com/services/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";
    // }
    
    // public function routeNotificationForMail()
    // {
    //     return $this->email_address;
    // }
}

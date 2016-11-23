<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
		'name',
		'email',
		'messages',
		'seen',
    ];

    protected $casts = ['seen' => 'boolean']; 

}

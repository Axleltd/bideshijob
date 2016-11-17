<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable = [        
        'name',        
        'address',
        'email',                
        'website_link',
        'latitude',
        'longitude',
        'social_media_id',
    ];

     public function socialMedia()
    {
        return $this->belongsTo('\App\SocialMedia');
    }

 
}

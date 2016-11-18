<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{    
    protected $table = 'all_social_medias';
    protected $fillable = [        
        'facebook',
        'twitter',
        'contact_id'
    ];

}

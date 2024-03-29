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
        'country'             
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float'
    ];
    

    public function contactable()
    {
        return $this->morphTo();
    }

    public function socialMedia()
    {
        return $this->hasOne('\App\SocialMedia','contact_id');
    }

    public function company()
    {
        return $this->belongsTo('\App\Company');
    }
 
}

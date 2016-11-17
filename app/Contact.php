<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $morphClass="Contact";
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

    public function contactable()
    {
        return $this->morphTo();
    }
}

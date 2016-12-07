<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Training extends Model
{
    use HasSlug;
    protected $table = 'trainings';
    protected $fillable = [        
        'company_id',
        'title',
        'categories',
        'fees',
        'quantity',
        'description',
        'from',
        'to',
        'country',
        'user_id',
        'image'
    ];

    public function company()
    {      	
        return $this->belongsTo('\App\Company');  
    } 

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }   

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}

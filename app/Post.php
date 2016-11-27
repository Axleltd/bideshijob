<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
	use HasSlug;
    protected $fillable =[
		'title',
		'slug',
		'content',
		'image',
		'short_description',
		'published',
		'published_on',
		'user_id',
    ];
    protected $dates = ['published_on','created_at','updated_at'];
    protected $casts = ['published'=>'boolean',];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    
}

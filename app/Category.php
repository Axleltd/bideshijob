<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
	use HasSlug;
	protected $fillable = [
		'name',
		'slug',
		'order',
		'featured',
	];

	protected $casts = ['featured' => 'boolean','order' => 'integer'];

	public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}

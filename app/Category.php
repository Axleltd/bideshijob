<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'name',
		'slug',
		'order',
		'featured',
	];

	protected $casts = ['featured' => 'boolean','order' => 'integer'];
}

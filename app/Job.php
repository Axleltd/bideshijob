<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Job extends Model
{
    use HasSlug;
    protected $table = 'jobs';
	protected $fillable = [
			'user_id',
			'company_id',
			'title',
			'categories',
			'about_job',
			'description',
			'facilities',
			'duties',
			'salary',
			'cost',
			'overtime',
			'quantity',
			'duty_hours',
			'featured',
			'requirement',
			'country',
			'image'
		];

	public function contact()
	{
	return $this->morphOne(Contact::class,'contactable');
	}
	public function user()
	{
		return $this->belongsTo(User::class,"user_id");
	}
	public function company()
	{
		return $this->belongsTo(Company::class,"company_id");
	}
	
	public function application()
	{
		return $this->morphMany(Application::class, "applicable");
	}

	public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
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
		];

	public function contact()
	{
		return $this->morphToMany(Contact::class, 'contactable');
	}
	public function user()
	{
		return $this->belongsTo(User::class,"user_id");
	}
	public function company()
	{
		return $this->belongsTo(Company::class,"company_id");
	}
}

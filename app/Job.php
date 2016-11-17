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
			'Duties',
			'salary',
			'cost',
			'overtime',
			'quantity',
			'duty_hours',
			'featured',
			'requirement',
			'contact_id',
		];

	public function contact()
	{
		return $this->hasOne(Contact::class, "contact_id");
	}
}

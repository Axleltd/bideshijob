<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $morphClass = 'Company';
    protected $table = 'companies';
    protected $fillable = [
    				'name',     				    				    				
    				'logo', 
    				'user_id',
    				'description',
    				'featured',
    				'contact_id',
    				];

   	/**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function contacts()
    {      	
        return $this->morphOne(\App\Contact::class, 'contactable');
    }
}

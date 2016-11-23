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
                    'id',                    
    				];
    protected $with = ['contacts','job'];
   	/**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function user()
    {      	
        return $this->belongsTo('\App\User');  
    }

    

    public function training()
    {
        return $this->hasMany('\App\Training');
    }
    public function job()
    {
        return $this->hasMany('\App\Job');
    }

    public function trainingWithOrder()
    {
        return $this->hasMany('\App\Training')->orderBy('created_at','DESC');
    }


    public function contacts()
    {
        return $this->morphOne('\App\Contact', 'contactable');
    }
}

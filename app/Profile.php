<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = [
    				'first_name',     				    				    				
    				'logo', 
    				'user_id',
    				'last_name',
    				'country',    				
            'phone',                    
    				];

   public function user()
   {
   	return $this->belongsTo('\App\User');  
   }
}

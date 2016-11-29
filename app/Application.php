<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    protected $fillable = [
			'full_name',     				    				    				
			'email', 
			'file',
			'contact',			
			];
}

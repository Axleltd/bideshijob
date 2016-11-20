<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'trainings';
    protected $fillable = [        
        'company_id',
        'title',
        'categories',
        'fees',
        'quantity',
    ];

    public function company()
    {      	
        return $this->belongsTo('\App\Company');  
    }
}

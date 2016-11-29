<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $fillable = ['name','content','published_on'];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
		'question',
		'answer',
		'status',
		'order',
    ];

    protected $casts = ['status' => 'boolean'];
}

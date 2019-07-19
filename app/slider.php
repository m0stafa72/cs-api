<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    //
    protected $fillable = [
    	'key',
    	'title',
		'description',
		'button',
		'image',
		'status',
		'link',
    ];
}

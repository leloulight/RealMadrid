<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
    

class Category extends Model
{
	protected $dates = ['deleted_at'];
	
	protected $fillable = ['title', 'slug'];

	public function post()
	{
    return $this->hasOne('App\Post');
	}
}

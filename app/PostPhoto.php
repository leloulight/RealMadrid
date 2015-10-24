<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPhoto extends Model
{
	protected $fillable = ['name','path', 'thumbnail_path', 'post_id'];

    public function post()
    {
    	return $this->belongsTo('App\Post');
    }
}

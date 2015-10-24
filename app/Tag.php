<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['title', 'slug'];

    public function post()
    {
    	return $this->belongsToMany('App\Post', 'post_tags', 'tag_id', 'post_id');
    }
}

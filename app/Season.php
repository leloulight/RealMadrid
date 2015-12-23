<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['title', 'position', 'slug'];

    public function players()
    {
    	return $this->hasMany('App\Player');
    }
}

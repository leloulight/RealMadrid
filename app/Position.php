<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['title', 'shortcode'];

    public function players()
    {
    	return $this->hasMany('App\Players');
    }
}

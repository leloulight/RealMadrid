<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Player;

class Country extends Model
{
    protected $fillable = ['title', 'flag_name', 'flag_path'];

    public function player()
    {
    	return $this->hasMany('App\Player');
    }
}

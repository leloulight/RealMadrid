<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Player;

class PlayerStatistic extends Model
{
	protected $fillable = ['player_id', 'goals', 'assists'];
	
    public function player()
    {
    	return $this->hasOne('App\Player');
    }
}

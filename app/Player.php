<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PlayerStatistic;

class Player extends Model
{
	protected $fillable = ['name', 'lastname', 'photo', 'birth_date', 'birth_place', 'weight', 'height', 'season_id', 'position_id', 'country_id'];
    public function statistics()
    {
    	return $this->belongsTo('App\PlayerStatistic');
    }
}

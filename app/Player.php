<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PlayerStatistic;
use App\Country;

class Player extends Model
{
	protected $fillable = ['name', 'lastname', 'photo', 'birth_date', 'birth_place', 'weight', 'height','number', 'season_id', 'position_id', 'country_id'];

    public function statistics()
    {
    	return $this->hasOne('App\PlayerStatistic');
    }

    public function season()
    {
    	return $this->belongsTo('App\Season');
    }

    public function position()
    {
    	return $this->belongsTo('App\Position');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}

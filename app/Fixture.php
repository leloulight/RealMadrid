<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stadium;
use App\League;
use App\Team;

class Fixture extends Model
{
    protected $fillable = ['stadium_id', 'league_id', 'fixture_date', 'team_1_id', 'team_2_id', 'team_1_score', 'team_2_score'];

/*   public function stadium()
    {
    	return $this->hasOne('App\Stadium');
    }

    public function league()
    {
    	return $this->hasOne('App\League');
    }

    public function team()
    {
    	return $this->hasMany('App\Team');
    }
    */
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fixture;

class Team extends Model
{
    protected $fillable = ['title', 'logo_name', 'logo_path', 'stadium_id'];

    public function leagues()
    {
    	return $this->belongsToMany('App\League');
    }

    public function fixture()
    {
    	return $this->belongsToMany('App\Fixture');
    }

    public function stadium(){
    	return $this->belongsTo('App\Stadium');
    }
}

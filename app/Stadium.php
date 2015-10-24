<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fixture;

class Stadium extends Model
{
	protected $table = 'stadiums';
    protected $fillable = ['title'];

    public function fixture()
    {
    	return $this->belongsTo('App\Fixture');
    }

    public function teams(){
    	return $this->hasMany('App\Team');
    }
}

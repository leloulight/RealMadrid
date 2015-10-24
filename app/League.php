<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Fixture;

class League extends Model
{
    protected $fillable = ['title', 'logo_name', 'logo_path'];

    public function teams()
    {
    	return $this->hasMany('App\Team');
    }

    public function fixture()
    {
    	return $this->belongsTo('App\Fixture');
    }
}

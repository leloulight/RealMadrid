<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santiago extends Model
{
    protected $table = 'santiago';

    protected $fillable = ['description', 'photo', 'opening', 'dimensions', 'address', 'capacity'];
}

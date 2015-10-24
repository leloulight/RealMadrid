<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PollResult extends Model
{
    protected $fillable = ['poll_id', 'poll_answer_id', 'user_id'];
}

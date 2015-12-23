<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use SoftDeletes;

class Post extends Model
{
    protected $dates = ['deleted_at'];

	//protected $dates = ['created_at','updated_at','published_at'];
    
    protected $fillable = ['title', 'categories','slug','post_id','photo_description','excerpt','body', 'user_id','category_id', 'published_at'];

    /*public function setPublishedAtAtributes($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }
*/

     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag', 'post_tags', 'post_id', 'tag_id');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function photos()
    {
        return $this->hasMany('App\PostPhoto');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now());
    }

    public function scopeUnPublished($query)
    {
        $query->where('published_at','>',Carbon::now());
    }

}

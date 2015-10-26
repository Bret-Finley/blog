<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blogposts';
    protected $fillable = ['title', 'description', 'body'];

    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}

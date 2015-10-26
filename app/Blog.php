<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['title', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function blogposts()
    {
        return $this->hasMany('App\BlogPost');
    }
}

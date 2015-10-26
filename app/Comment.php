<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['username', 'comment', 'blogpost_id'];

    public function blogpost()
    {
        return $this->belongsTo('App\BlogPost');
    }
}

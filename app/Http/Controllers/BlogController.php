<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\BlogPost;
use App\Comment;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'posttitle' => 'required',
            'postdesc' => 'required',
            'postbody' => 'required'
            ]);

        $input = $request->all();
        $title = $input["posttitle"];
        $description = $input["postdesc"];
        $body = $input["postbody"];
        $user = Auth::user();
        $user->blog()->first()->blogposts()->save(new BlogPost(array(
            'title' => $title,
            'description' => $description,
            'body' => $body
        )));

        return redirect('/');
    }

    public function saveComment(Request $request, $id)
    {
        $this->validate($request, ['comment' => 'required'],[
            'required' => 'Please enter a comment'
            ]);

        $post = BlogPost::find($id);
        $input = $request->all();
        $username = Auth::user()->username;
        $comment = $input["comment"];

        $post->comments()->save(new Comment(array(
            'username' => $username,
            'comment' => $comment
        )));

        return redirect('/view-post/'.$id);
    }
}

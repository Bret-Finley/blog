<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\BlogPost;
use App\Blog;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
  public function getBlogPost($id)
  {
    $data = [];
    $post = BlogPost::find($id);
    $data["post"] = $post;
    $data["comments"] = $post->comments()->get();
    return view('view-post', $data);
  }

  public function getBlog($id)
  {
    $blog = Blog::find($id);
    $data = [];
    $data["posts"] = $blog->blogposts()->get();
    return view('view-blog', $data);
  }

  public function getBlogs()
  {
    $data = [];
    $data["blogs"] = Blog::all();
    return view('home', $data);
  }
}

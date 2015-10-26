@extends('app')


@section('content')
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<h2 id="post-title">{{ $post->title }}</h2>
By: <em>{{ $post->blog()->first()->user()->first()->username }}</em><br />
In: <em>{{ $post->blog()->first()->title }}</em><br />
Posted: <em>{{ $post->created_at }}</em>
<hr />
<p class="post-body">{{ $post->body }}</p>
<hr />
<h4>Comments</h4>

@if(Auth::check())
<div id="commentbox">
{!! Form::open() !!}

<div class="form-group">
    {!! Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Post Comment', 'rows' => '5']) !!}
</div>
{!! Form::submit('Post Comment', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
</div>
</div>
</div>
@endif

@if ($errors->any())
  <ul class="alert alert-danger">
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul>
@endif

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
@foreach ($comments as $comment)
<div class="panel panel-default">
    <div class="panel-heading">
    <strong>{{ $comment->username }}</strong> commented at <strong>{{ $comment->created_at }}</strong>
    </div>
    <div class="panel-body">
        {{ $comment->comment }}
    </div>
</div>

@endforeach
</div>
</div>

@stop

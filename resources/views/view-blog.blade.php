@extends('app')


@section('content')

@foreach ($posts as $post)

<div class="row">
<div class="col-md-3"></div>
<div class="well col-md-6">
    <a href="/view-post/{{ $post->id }}"><h3 class="news-header">{{ $post->title }}</h3></a>
    <hr>
    In: <em><a href="/view-blog/{{ $post->blog()->first()->id }}">{{ $post->blog()->first()->title }}</a></em><br />
    By: <em>{{ $post->blog()->first()->user()->first()->username }}</em><br />
    Posted: <em>{{ $post->created_at }}</em>
    <p style="margin-top: 10px;">{{ $post->description }}</p>
</div>
</div>

@endforeach

@stop

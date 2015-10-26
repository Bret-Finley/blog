@extends('app')

@section('content')

@foreach ($blogs as $blog)

<div class="row">
<div class="col-md-3"></div>
<div class="well col-md-6">
    <a href="view-blog/{{ $blog->id }}"><h3 class="news-header">{{ $blog->title }}</h3></a>
    By: <em>{{ $blog->user()->first()->username }}</em>
    <hr>
    <p style="margin-top: 10px;">{{ $blog->description }}</p>
</div>
</div>

@endforeach

@stop

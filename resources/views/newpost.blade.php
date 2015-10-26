@extends('app')


@section('content')

@if(Auth::check())
<div class="row">
<div class="col-md-3"></div>
<div class="well col-md-6">

{!! Form::open() !!}
  <legend>Create Post</legend>
  <div class="form-group">
      {!! Form::label('posttitle', 'Post Title') !!}
      {!! Form::text('posttitle', null, ['class' => 'form-control', 'placeholder' => 'Post Title']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('postdesc', 'Post Description') !!}
      {!! Form::textarea('postdesc', null, ['class' => 'form-control', 'placeholder' => 'Post Description', 'rows' => '5']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('postbody', 'Post Body') !!}
      {!! Form::textarea('postbody', null, ['class' => 'form-control', 'placeholder' => 'Post Body', 'rows' => '10']) !!}
  </div>
  {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
</div>
</div>

@else
<div class="jumbotron">
    <div class="container">
        <h1>Hey There!</h1>
        <p>Looks like you need an account to access this page<br />
        <a href="/login" class="btn btn-info btn-lg">Log In Here!</a> or <a href="/register" class="btn btn-info btn-lg">Register Here!</a>
        </p>
    </div>
</div>
@endif

@stop

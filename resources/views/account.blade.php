@extends('app')

@section('content')

<div class="row">
<div class="col-md-3"></div>
<div class="well col-md-6">

{!! Form::open() !!}
  <legend>Edit Account</legend>
  <div class="form-group">
      {!! Form::label('uname', 'Username') !!}
      {!! Form::text('uname', $username, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('pw', 'Password') !!}<span style="color:blue; margin-left: 10px" class="simptip-position-top" data-tooltip="Enter and confirm your password to make changes. If you want to change your password, simply enter/confirm the password you want">?</span>
      {!! Form::password('pw', ['class' => 'form-control', 'placeholder' => 'New Password']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('cpw', 'Confirm Password') !!}
      {!! Form::password('cpw', ['class' => 'form-control', 'placeholder' => 'Confirm New Password']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('bt', 'Blog Title') !!}
      {!! Form::text('bt', $blog->title, ['class' => 'form-control']) !!}
  </div>
  <div class="form-group">
      {!! Form::label('bd', 'Blog Description') !!}
      {!! Form::textarea('bd', $blog->description, ['class' => 'form-control', 'rows' => '5']) !!}
  </div>
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

  {!! Form::close() !!}

  @if ($errors->any())
    <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  @endif
</div>
</div>

@stop

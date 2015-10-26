@extends('app')

@section('content')

<div class="col-md-3"></div>
<div class="well col-md-6">

{!! Form::open() !!}

<div class="form-group">
    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
</div>
<div class="form-group">
    {!! Form::label('confirmpassword', 'Confirm Password') !!}
    {!! Form::password('confirmpassword', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
</div>
<div class="form-group">
    {!! Form::label('blogtitle', 'Blog Title') !!}
    {!! Form::text('blogtitle', null, ['class' => 'form-control', 'placeholder' => 'Blog Title']) !!}
</div>
<div class="form-group">
    {!! Form::label('blogdesc', 'Blog Description') !!}
    {!! Form::textarea('blogdesc', null, ['class' => 'form-control', 'placeholder' => 'Blog Description', 'rows' => '5']) !!}
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@if ($errors->any())
  <ul class="alert alert-danger">
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul>
@endif

</div>


@stop
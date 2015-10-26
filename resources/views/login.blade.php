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

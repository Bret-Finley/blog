@extends('app')

@section('content')

@if(!Session::has('steamid'))
    Please log in first

@else

<div class="col-md-2"></div>
<div class="well col-md-8 friend-well">
    <div class="col-md-4">
        <img src="{{ $avatarfull }}" class="img-responsive center-block" />
    </div>
    <div class="col-md-8">
        Username: {{ $personaname }}<br />
        Real Name: {{ $realname }}<br />
        <a href='{{ $profileurl }}'>Profile Link</a><br />
        Created: {{ date("m-d-Y", $timecreated) }}<br />
        Last Online: {{ date("m-d-Y", $lastlogoff) }}<br />
        Location: {{ $locstatecode }}, {{ $loccountrycode }}<br />
    </div>
</div>

@endif

@stop

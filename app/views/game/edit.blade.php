@extends('layout.layout')
@section('content')
{{ Form::open(array('url' => action("GameController@game_save", array($game->id)), 'method' => 'POST')) }}

<p>{{ Form::label('week_name', 'Title of the Week') }}</p>
{{ $errors->first('week_name', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::text('week_name', $game->week_name ) }}</p>


<p>{{ Form::label('period_start', 'Start of the Period') }}</p>
{{ $errors->first('period_start', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::input('datetime', 'period_start', $game->period_start) }}</p>


<p>{{ Form::label('period_end', 'End of the Period') }}</p>
{{ $errors->first('period_end', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::input('datetime','period_end', $game->period_end) }}</p>

{{ Form::hidden('back', URL::previous() ) }}
<div class="btn-group">{{ Form::submit('Save',['class' => 'btn btn-primary ']) }}
    </div>
{{ Form::close() }}    
@stop
@extends('layout.layout')
@section('content')
{{ Form::open(array('url' => action("GameController@update"), 'method' => 'POST')) }}

<p>{{ Form::label('week_name', 'Title of the Week') }}</p>
{{ $errors->first('week_name', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::text('week_name') }}</p>


<p>{{ Form::label('period_start', 'Start of the Period') }}</p>
{{ $errors->first('period_start', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::input('datetime', 'period_start', 'Y-M-D H:M:S') }}</p>


<p>{{ Form::label('period_end', 'End of the Period') }}</p>
{{ $errors->first('period_end', '<p class="alert alert-danger">:message<a class="close" data-dismiss="alert" href="#">&times;</a></p>') }}
<p>{{ Form::input('datetime','period_end', 'Y-M-D H:M:S') }}</p>

{{ Form::hidden('back', URL::previous() ) }}
<div class="btn-group">{{ Form::submit('Save',['class' => 'btn btn-primary ']) }}
    </div>
{{ Form::close() }}    
@stop

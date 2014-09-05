@extends('layout.layout')
@section('content')
    {{ Form::open(array('url' => action("DayController@save_results", array($game->id)),'method' => 'POST')) }}
    <h2>{{$game->week_name}}</h2>
    <div class="span11">
    <table class="table table-bordered">
    <thead><tr>
            <th>Home Team</th>
            <th>Guest Team</th>
            </tr>
            </thead>
    <tbody>
    @foreach ($day as $a)
    <tr>
    <td>{{$a->hometeam}}</td>
    <td>{{$a->guestteam}}</td>
    </tr>   
    <tr>
        <td><input type="number" name="home_result[]" value=''</td>
        <td><input type="number" name="guest_result[]" value=''</td>
    </tr>
    @endforeach
    </tbody>
            </table>
            
    {{ Form::hidden('back', URL::previous() ) }}
    <div class="btn-group">
    {{ Form::submit('Save',['class' => 'btn btn-primary ']) }}
    </div>
    {{ Form::close() }}    
@stop

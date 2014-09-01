@extends('layout.layout')
@section('content')
    <h1>   .  </h1>
    {{ Form::open(array('url' => action("DayController@save_results", array($game->id)),'method' => 'POST')) }}
    <h2>{{$game->week_name}}</h2>
    <div class="span11">
    <table class="table table-bordered">
    <thead><tr>
            <th>Home Team</th>
            <th>Guest Team</th>
            <th>Chosen Winner Team</th>
            <th>User</th>
            <th>Time</th>
            </tr>
    </thead>
    <tbody>
    @foreach($tipp as $b)
    @foreach($day as $a)
    @if(($b->winnerteam==$a->hometeam)||($b->winnerteam==$a->guestteam))
    <tr>
    <td>{{$a->hometeam}}</td>
    <td>{{$a->guestteam}}</td>
    <td>{{$b->winnerteam}}</td>
    <td>{{User::where('id', $b->user_id)->pluck('username');}}</td>
    <td>{{$b->created_at}}</td>
    </tr>
    @endif
    @endforeach
    @endforeach    
    </tbody>
            </table>
            
    {{ Form::hidden('back', URL::previous() ) }}
    <div class="btn-group">
    {{ Form::submit('Save',['class' => 'btn btn-primary ']) }}
    </div>
    {{ Form::close() }}    
@stop



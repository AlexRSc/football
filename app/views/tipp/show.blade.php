@extends('layout.layout')
@section('content')
    {{ Form::open(array('url' => action("GameController@lists"),'method' => 'GET')) }}
    <h2>{{$game->week_name}}</h2>
    <div class="span11">
    <table class="table table-bordered">
    <thead><tr>
            <th>Home Team</th>
            <th>Home Spread</th>
            <th>Guest Team</th>
            <th>Guest Spread</th>
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
    @if($a->quote_home>0)
    <td>+{{$a->quote_home}}</td>
    @else
    <td>{{$a->quote_home}}</td>
    @endif
    <td>{{$a->guestteam}}</td>
    @if($a->quote_guest>0)
    <td>+{{$a->quote_guest}}</td>
    @else
    <td>{{$a->quote_guest}}</td>
    @endif
    <td>{{$b->winnerteam}}</td>
    <td>{{User::where('id', $b->user_id)->pluck('username');}}</td>
    <td>{{$b->updated_at}}</td>
    </tr>
    @endif
    @endforeach
    @endforeach    
    </tbody>
            </table>
            
    {{ Form::hidden('back', URL::previous() ) }}
    <div class="btn-group">
    {{ Form::submit('Back',['class' => 'btn btn-primary ']) }}
    </div>
    {{ Form::close() }}    
@stop



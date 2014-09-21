@extends('layout.layout')
@section('content')
{{ Form::open(array('url' => action("GameController@lists"),'method' => 'GET')) }}
<h2>{{$game->week_name}}</h2>
<div class="span11">
    <table class="table table-bordered">
        <thead><tr>
                <th>Home Team</th>
                <th>Home Result</th>
                <th>Spread</th>
                <th>Guest Team</th>
                <th>Guest Result</th>
                <th>Spread</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($day as $a)
            <tr>
                @if($a->hometeam==$a->winnerteam)
                <td BGCOLOR="#00ff00">{{$a->hometeam}}</td>
                <td BGCOLOR="#00ff00">{{$a->home_result}}</td>
                @if($a->quote_home>0)
                <td BGCOLOR="#00ff00">+{{$a->quote_home}}</td>
                @else
                <td BGCOLOR="#00ff00">{{$a->quote_home}}</td>
                @endif
                <td BGCOLOR="RED">{{$a->guestteam}}</td>
                <td BGCOLOR="RED">{{$a->guest_result}}</td>
                @if($a->quote_guest>0)
                <td BGCOLOR="RED">+{{$a->quote_guest}}</td>
                @else
                <td BGCOLOR="RED">{{$a->quote_guest}}</td>
                @endif
                @endif
                @if($a->guestteam==$a->winnerteam)
                <td BGCOLOR="RED">{{$a->hometeam}}</td>
                <td BGCOLOR="RED">{{$a->home_result}}</td>
                @if($a->quote_home>0)
                <td BGCOLOR='RED'>+{{$a->quote_home}}</td>
                @else
                <td BGCOLOR='RED'>{{$a->quote_home}}</td>
                @endif
                <td BGCOLOR="#00ff00">{{$a->guestteam}}</td>
                <td BGCOLOR="#00ff00">{{$a->guest_result}}</td>
                @if($a->quote_guest>0)
                <td BGCOLOR="#00ff00">+{{$a->quote_guest}}</td>
                @else
                <td BGCOLOR="#00ff00">{{$a->quote_guest}}</td>
                @endif
                @endif
            </tr>   
            @endforeach
        </tbody>
    </table>
    <h2> User Ranking! </h2>
    <table class="table table-bordered">
        <thead><tr>
                <th>User</th>
                <th>Correct Tipps</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $a)
            @if(sizeOf(Tipp::where('week_id', $game->id)->where('user_id', $a->id)->where('evaluation', 1)->get())==5)
            <tr>
                <td>{{$a->username}}</td>
                <td>5</td>
            </tr>   
            @endif
            @endforeach
            @foreach ($user as $a)
            @if(sizeOf(Tipp::where('week_id', $game->id)->where('user_id', $a->id)->where('evaluation', 1)->get())==4)
            <tr>
                <td>{{$a->username}}</td>
                <td>4</td>
            </tr>   
            @endif
            @endforeach
            @foreach ($user as $a)
            @if(sizeOf(Tipp::where('week_id', $game->id)->where('user_id', $a->id)->where('evaluation', '1')->get())==3)
            <tr>
                <td>{{$a->username}}</td>
                <td>3</td>
            </tr> 
            @endif
            @endforeach
            @foreach ($user as $a)
            @if(sizeOf(Tipp::where('week_id', $game->id)->where('user_id', $a->id)->where('evaluation', '1')->get())==2)
            <tr>
                <td>{{$a->username}}</td>
                <td>2</td>
            </tr> 
            @endif
            @endforeach
            @foreach ($user as $a)
            @if(sizeOf(Tipp::where('week_id', $game->id)->where('user_id', $a->id)->where('evaluation', '1')->get())==1)
            <tr>
                <td>{{$a->username}}</td>
                <td>1</td>
            </tr> 
            @endif
            @endforeach
            @foreach ($user as $a)
            @if(sizeOf(Tipp::where('week_id', $game->id)->where('user_id', $a->id)->where('evaluation', '1')->get())==0)
            @if(sizeOf(Tipp::where('week_id', $game->id)->where('user_id', $a->id)->get())!=0)
            <tr>
                <td>{{$a->username}}</td>
                <td>0</td>
            </tr> 
            @endif
            @endif
            @endforeach
        </tbody>
    </table>
    <h2>Tipps submitted </h2>

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
            @if(($a->winnerteam==$b->winnerteam))
            <tr BGCOLOR="#00ff00">
                <td>{{$a->hometeam}}</td>
                <td>{{$a->guestteam}}</td>
                <td>{{$b->winnerteam}}</td>
                <td>{{User::where('id', $b->user_id)->pluck('username');}}</td>
                <td>{{$b->updated_at}}</td>
            </tr>
            @else
            <tr BGCOLOR="RED">
                <td>{{$a->hometeam}}</td>
                <td>{{$a->guestteam}}</td>
                <td>{{$b->winnerteam}}</td>
                <td>{{User::where('id', $b->user_id)->pluck('username');}}</td>
                <td>{{$b->updated_at}}</td>
                @endif
                @endif
                @endforeach
                @endforeach    
        </tbody>
    </table>
</div>

{{ Form::hidden('back', URL::previous() ) }}
<div class="btn-group">
    {{ Form::submit('Back!!',['class' => 'btn btn-primary ']) }}
</div>
{{ Form::close() }}    
@stop

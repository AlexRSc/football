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
            <th></th>
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
    <td>
    @if($b->winnerteam=='Buffalo Bills')
    {{ HTML::image('img/Bills.png') }}
    @endif
    @if($b->winnerteam=='Miami Dolphins')
    {{ HTML::image('img/Dolphins.png') }}
    @endif
    @if($b->winnerteam=='NE Patriots')
    {{ HTML::image('img/Patriots.png') }}
    @endif
    @if($b->winnerteam=='New York Jets')
    {{ HTML::image('img/Jets.png') }}
    @endif
    @if($b->winnerteam=='Denver Broncos')
    {{ HTML::image('img/Broncos.png') }}
    @endif
    @if($b->winnerteam=='Kansas City Chiefs')
    {{ HTML::image('img/Chiefs.png') }}
    @endif
    @if($b->winnerteam=='Oakland Raiders')
    {{ HTML::image('img/Raiders.png') }}
    @endif
    @if($b->winnerteam=='San Diego Chargers')
    {{ HTML::image('img/Chargers.png') }}
    @endif
    @if($b->winnerteam=='Baltimore Ravens')
    {{ HTML::image('img/Ravens.png') }}
    @endif
    @if($b->winnerteam=='Cincinnati Bengals')
    {{ HTML::image('img/Bengals.png') }}
    @endif
    @if($b->winnerteam=='Cleveland Browns')
    {{ HTML::image('img/Browns.png') }}
    @endif
    @if($b->winnerteam=='Pittsburg Steelers')
    {{ HTML::image('img/Steelers.png') }}
    @endif
    @if($b->winnerteam=='Houston Texans')
    {{ HTML::image('img/Texans.png') }}
    @endif
    @if($b->winnerteam=='Indianapolis Colts')
    {{ HTML::image('img/Colts.png') }}
    @endif
    @if($b->winnerteam=='Jacksonville Jaguars')
    {{ HTML::image('img/Jaguars.png') }}
    @endif
    @if($b->winnerteam=='Tennessee Titans')
    {{ HTML::image('img/Titans.png') }}
    @endif
    @if($b->winnerteam=='Dallas Cowboys')
    {{ HTML::image('img/Cowboys.png') }}
    @endif
    @if($b->winnerteam=='New York Giants')
    {{ HTML::image('img/Giants.png') }}
    @endif
    @if($b->winnerteam=='Philadelphia Eagles')
    {{ HTML::image('img/Eagels.png') }}
    @endif
    @if($b->winnerteam=='Washington Redskins')
    {{ HTML::image('img/Redskins.png') }}
    @endif
    @if($b->winnerteam=='Arizona Cardinals')
    {{ HTML::image('img/Cardinals.png') }}
    @endif
    @if($b->winnerteam=='San Francisco 49ers')
    {{ HTML::image('img/San Francisco.png') }}
    @endif
    @if($b->winnerteam=='Seattle Seahawks')
    {{ HTML::image('img/Seahawks.png') }}
    @endif
    @if($b->winnerteam=='St. Louis Rams')
    {{ HTML::image('img/Rams.png') }}
    @endif
    @if($b->winnerteam=='Chicago Bears')
    {{ HTML::image('img/Bears.png') }}
    @endif
    @if($b->winnerteam=='Detriot Lions')
    {{ HTML::image('img/Lions.png') }}
    @endif
    @if($b->winnerteam=='Green Bay Packers')
    {{ HTML::image('img/Pakers.png') }}
    @endif
    @if($b->winnerteam=='Minnesota Vikings')
    {{ HTML::image('img/Vikings.png') }}
    @endif
    @if($b->winnerteam=='Atlanta Falcons')
    {{ HTML::image('img/Falcons.png') }}
    @endif
    @if($b->winnerteam=='Carolina Panthers')
    {{ HTML::image('img/Panthers.png') }}
    @endif
    @if($b->winnerteam=='New Orleans Saints')
    {{ HTML::image('img/Saints.png') }}
    @endif
    @if($b->winnerteam=='Tampa Bay Buccaneers')
    {{ HTML::image('img/Buccaneers.png') }}
    @endif
    </td>
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
    {{ Form::submit('Back',['class' => 'btn btn-primary ']) }}
    </div>
    {{ Form::close() }}    
@stop



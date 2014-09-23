@extends('layout.layout')
@section('content')
     {{ Form::open(array('url' => action("TippController@save", array($game->id)),'method' => 'POST')) }}
<h1 style='max-height:300px'> {{$game->week_name}} </h1>
<div class="span11">
    <table class="table table-bordered">
    <thead><tr>
            <th>Spread HomeTeam</th>
            <th></th>
            <th>HomeTeam</th>
            <th></th>
            <th>Choose a Winner</th>
            <th></th>
            <th>GuestTeam</th> 
            <th></th>
            <th>Spread GuestTeam</th>
            </tr>
    </thead>
    <tbody>
@for($i=0;$i<12;$i++)
<tr>
<td>@if($day[$i]->quote_home>0)
    +{{$day[$i]->quote_home}}
    @else
    {{$day[$i]->quote_home}}
    @endif
</td>
<td>@if($day[$i]->hometeam=='Buffalo Bills')
    {{ HTML::image('img/Bills.png') }}
    @endif
    @if($day[$i]->hometeam=='Miami Dolphins')
    {{ HTML::image('img/Dolphins.png') }}
    @endif
    @if($day[$i]->hometeam=='NE Patriots')
    {{ HTML::image('img/Patriots.png') }}
    @endif
    @if($day[$i]->hometeam=='New York Jets')
    {{ HTML::image('img/Jets.png') }}
    @endif
    @if($day[$i]->hometeam=='Denver Broncos')
    {{ HTML::image('img/Broncos.png') }}
    @endif
    @if($day[$i]->hometeam=='Kansas City Chiefs')
    {{ HTML::image('img/Chiefs.png') }}
    @endif
    @if($day[$i]->hometeam=='Oakland Raiders')
    {{ HTML::image('img/Raiders.png') }}
    @endif
    @if($day[$i]->hometeam=='San Diego Chargers')
    {{ HTML::image('img/Chargers.png') }}
    @endif
    @if($day[$i]->hometeam=='Baltimore Ravens')
    {{ HTML::image('img/Ravens.png') }}
    @endif
    @if($day[$i]->hometeam=='Cincinnati Bengals')
    {{ HTML::image('img/Bengals.png') }}
    @endif
    @if($day[$i]->hometeam=='Cleveland Browns')
    {{ HTML::image('img/Browns.png') }}
    @endif
    @if($day[$i]->hometeam=='Pittsburg Steelers')
    {{ HTML::image('img/Steelers.png') }}
    @endif
    @if($day[$i]->hometeam=='Houston Texans')
    {{ HTML::image('img/Texans.png') }}
    @endif
    @if($day[$i]->hometeam=='Indianapolis Colts')
    {{ HTML::image('img/Colts.png') }}
    @endif
    @if($day[$i]->hometeam=='Jacksonville Jaguars')
    {{ HTML::image('img/Jaguars.png') }}
    @endif
    @if($day[$i]->hometeam=='Tennessee Titans')
    {{ HTML::image('img/Titans.png') }}
    @endif
    @if($day[$i]->hometeam=='Dallas Cowboys')
    {{ HTML::image('img/Cowboys.png') }}
    @endif
    @if($day[$i]->hometeam=='New York Giants')
    {{ HTML::image('img/Giants.png') }}
    @endif
    @if($day[$i]->hometeam=='Philadelphia Eagles')
    {{ HTML::image('img/Eagels.png') }}
    @endif
    @if($day[$i]->hometeam=='Washington Redskins')
    {{ HTML::image('img/Redskins.png') }}
    @endif
    @if($day[$i]->hometeam=='Arizona Cardinals')
    {{ HTML::image('img/Cardinals.png') }}
    @endif
    @if($day[$i]->hometeam=='San Francisco 49ers')
    {{ HTML::image('img/San Francisco.png') }}
    @endif
    @if($day[$i]->hometeam=='Seattle Seahawks')
    {{ HTML::image('img/Seahawks.png') }}
    @endif
    @if($day[$i]->hometeam=='St. Louis Rams')
    {{ HTML::image('img/Rams.png') }}
    @endif
    @if($day[$i]->hometeam=='Chicago Bears')
    {{ HTML::image('img/Bears.png') }}
    @endif
    @if($day[$i]->hometeam=='Detriot Lions')
    {{ HTML::image('img/Lions.png') }}
    @endif
    @if($day[$i]->hometeam=='Green Bay Packers')
    {{ HTML::image('img/Pakers.png') }}
    @endif
    @if($day[$i]->hometeam=='Minnesota Vikings')
    {{ HTML::image('img/Vikings.png') }}
    @endif
    @if($day[$i]->hometeam=='Atlanta Falcons')
    {{ HTML::image('img/Falcons.png') }}
    @endif
    @if($day[$i]->hometeam=='Carolina Panthers')
    {{ HTML::image('img/Panthers.png') }}
    @endif
    @if($day[$i]->hometeam=='New Orleans Saints')
    {{ HTML::image('img/Saints.png') }}
    @endif
    @if($day[$i]->hometeam=='Tampa Bay Buccaneers')
    {{ HTML::image('img/Buccaneers.png') }}
    @endif
</td>    
<td>    {{$day[$i]->hometeam}}
</td>
<td>@for($b=0;$b<5;$b++)
    @if(isset($tipp[$b]))
    @if($tipp[$b]->winnerteam==$day[$i]->hometeam)
    <input type="checkbox" name="winnerteam[]" value='{{$day[$i]->hometeam}}' checked>    
    @endif
    @if((($tipp[0]->winnerteam!=$day[$i]->hometeam)&&($tipp[1]->winnerteam!=$day[$i]->hometeam)
    &&($tipp[2]->winnerteam!=$day[$i]->hometeam)&&($tipp[3]->winnerteam!=$day[$i]->hometeam)
    &&($tipp[4]->winnerteam!=$day[$i]->hometeam))&&($b==4))
    <input type="checkbox" name="winnerteam[]" value='{{$day[$i]->hometeam}}'>    
    @endif
    @endif
    @if(!isset($tipp[$b])&&($b==4))
    <input type="checkbox" name="winnerteam[]" value='{{$day[$i]->hometeam}}'>    
    @endif
    @endfor
</td>
<td>vs</td> 
<td>@for($b=0;$b<5;$b++)
    @if(isset($tipp[$b]))
    @if($tipp[$b]->winnerteam==$day[$i]->guestteam)
    <input type="checkbox" name="winnerteam[]" value='{{$day[$i]->guestteam}}' checked>
    @endif
    @if((($tipp[0]->winnerteam!=$day[$i]->guestteam)&&($tipp[1]->winnerteam!=$day[$i]->guestteam)
    &&($tipp[2]->winnerteam!=$day[$i]->guestteam)&&($tipp[3]->winnerteam!=$day[$i]->guestteam)
    &&($tipp[4]->winnerteam!=$day[$i]->guestteam))&&($b==4))
    <input type="checkbox" name="winnerteam[]" value='{{$day[$i]->guestteam}}'>    
    @endif
    @endif
    @if(!isset($tipp[$b])&&($b==4))
    <input type="checkbox" name="winnerteam[]" value='{{$day[$i]->guestteam}}'>    
    @endif
    @endfor
</td>
<td>{{$day[$i]->guestteam}}</td>
<td>
    @if($day[$i]->guestteam=='Buffalo Bills')
    {{ HTML::image('img/Bills.png') }}
    @endif
    @if($day[$i]->guestteam=='Miami Dolphins')
    {{ HTML::image('img/Dolphins.png') }}
    @endif
    @if($day[$i]->guestteam=='NE Patriots')
    {{ HTML::image('img/Patriots.png') }}
    @endif
    @if($day[$i]->guestteam=='New York Jets')
    {{ HTML::image('img/Jets.png') }}
    @endif
    @if($day[$i]->guestteam=='Denver Broncos')
    {{ HTML::image('img/Broncos.png') }}
    @endif
    @if($day[$i]->guestteam=='Kansas City Chiefs')
    {{ HTML::image('img/Chiefs.png') }}
    @endif
    @if($day[$i]->guestteam=='Oakland Raiders')
    {{ HTML::image('img/Raiders.png') }}
    @endif
    @if($day[$i]->guestteam=='San Diego Chargers')
    {{ HTML::image('img/Chargers.png') }}
    @endif
    @if($day[$i]->guestteam=='Baltimore Ravens')
    {{ HTML::image('img/Ravens.png') }}
    @endif
    @if($day[$i]->guestteam=='Cincinnati Bengals')
    {{ HTML::image('img/Bengals.png') }}
    @endif
    @if($day[$i]->guestteam=='Cleveland Browns')
    {{ HTML::image('img/Browns.png') }}
    @endif
    @if($day[$i]->guestteam=='Pittsburg Steelers')
    {{ HTML::image('img/Steelers.png') }}
    @endif
    @if($day[$i]->guestteam=='Houston Texans')
    {{ HTML::image('img/Texans.png') }}
    @endif
    @if($day[$i]->guestteam=='Indianapolis Colts')
    {{ HTML::image('img/Colts.png') }}
    @endif
    @if($day[$i]->guestteam=='Jacksonville Jaguars')
    {{ HTML::image('img/Jaguars.png') }}
    @endif
    @if($day[$i]->guestteam=='Tennessee Titans')
    {{ HTML::image('img/Titans.png') }}
    @endif
    @if($day[$i]->guestteam=='Dallas Cowboys')
    {{ HTML::image('img/Cowboys.png') }}
    @endif
    @if($day[$i]->guestteam=='New York Giants')
    {{ HTML::image('img/Giants.png') }}
    @endif
    @if($day[$i]->guestteam=='Philadelphia Eagles')
    {{ HTML::image('img/Eagels.png') }}
    @endif
    @if($day[$i]->guestteam=='Washington Redskins')
    {{ HTML::image('img/Redskins.png') }}
    @endif
    @if($day[$i]->guestteam=='Arizona Cardinals')
    {{ HTML::image('img/Cardinals.png') }}
    @endif
    @if($day[$i]->guestteam=='San Francisco 49ers')
    {{ HTML::image('img/San Francisco.png') }}
    @endif
    @if($day[$i]->guestteam=='Seattle Seahawks')
    {{ HTML::image('img/Seahawks.png') }}
    @endif
    @if($day[$i]->guestteam=='St. Louis Rams')
    {{ HTML::image('img/Rams.png') }}
    @endif
    @if($day[$i]->guestteam=='Chicago Bears')
    {{ HTML::image('img/Bears.png') }}
    @endif
    @if($day[$i]->guestteam=='Detriot Lions')
    {{ HTML::image('img/Lions.png') }}
    @endif
    @if($day[$i]->guestteam=='Green Bay Packers')
    {{ HTML::image('img/Pakers.png') }}
    @endif
    @if($day[$i]->guestteam=='Minnesota Vikings')
    {{ HTML::image('img/Vikings.png') }}
    @endif
    @if($day[$i]->guestteam=='Atlanta Falcons')
    {{ HTML::image('img/Falcons.png') }}
    @endif
    @if($day[$i]->guestteam=='Carolina Panthers')
    {{ HTML::image('img/Panthers.png') }}
    @endif
    @if($day[$i]->guestteam=='New Orleans Saints')
    {{ HTML::image('img/Saints.png') }}
    @endif
    @if($day[$i]->guestteam=='Tampa Bay Buccaneers')
    {{ HTML::image('img/Buccaneers.png') }}
    @endif
</td> 
<td>@if($day[$i]->quote_guest>0)
    +{{$day[$i]->quote_guest}}
    @else
    {{$day[$i]->quote_guest}}
    @endif
</td>
</tr>
@endfor
</tbody>
    </table>
    <strong><p>This Weeks Jackpot!</p></strong>
    <strong><p>{{$game->jackpot}}</p></strong>


{{ Form::hidden('back', URL::previous() ) }}
<div class="btn-group">{{ Form::submit('Save',['class' => 'btn btn-primary ']) }}
</div>
{{ Form::close() }}    
@stop   
@extends('layout.layout')
@section('content')
{{ Form::open(array('url' => action("DayController@save", array($game->id)),'method' => 'POST')) }}

<h1 style='max-height:300px'> {{$game->week_name}} </h1>
<div class="span11">
    <table class="table table-bordered">
    <thead><tr>
            <th>Spread HomeTeam</th>
            <th>HomeTeam</th>
            <th></th>
            <th>Winner</th>
            <th></th>
            <th>GuestTeam</th>      
            <th>Spread GuestTeam</th>
            </tr>
    </thead>
    <tbody>
@for($i=0;$i<12;$i++)
<tr>
<td>
    @if((isset($day[$i])))
    <input type="text" name="quote_home[]" value="{{$day[$i]->quote_home}}"> 
    @endif
    @if((!isset($day[$i])))
    <input type="text" name="quote_home[]" value="Spread">
    @endif
    
</td>
<td><select name="hometeam[]"> 
        @if((isset($day[$i])))
        <option value="{{$day[$i]->hometeam}}" selected>{{$day[$i]->hometeam}}</option>
        @endif
        <option value='Buffalo Bills'>Buffalo Bills</option></br>
        <option value='Miami Dolphins'>Miami Dolphins</option></br>
        <option value='NE Patriots'>NE Patriots</option></br>
        <option value='New York Jets'>New York Jets</option></br>
        <option value='Denver Broncos'>Denver Broncos</option></br>
        <option value='Kansas City Chiefs'>Kansas City Chiefs</option></br>
        <option value='Oakland Raiders'>Oakland Raiders</option></br>
        <option value='San Diego Chargers'>San Diego Chargers</option></br>
        <option value='Baltimore Ravens'>Baltimore Ravens</option></br>
        <option value='Cincinnati Bengals'>Cincinnati Bengals</option></br>
        <option value='Cleveland Browns'>Cleveland Browns</option></br>
        <option value='Pittsburg Steelers'>Pittsburg Steelers</option></br>
        <option value='Houston Texans'>Houston Texans</option></br>
        <option value='Indianapolis Colts'>Indianapolis Colts</option></br>
        <option value='Jacksonville Jaguars'>Jacksonville Jaguars</option></br>
        <option value='Tennessee Titans'>Tennessee Titans</option></br>
        <option value='Dallas Cowboys'>Dallas Cowboys</option></br>
        <option value='New York Giants'>New York Giants</option></br>
        <option value='Philadelphia Eagles'>Philadelphia Eagles</option></br>
        <option value='Washington Redskins'>Washington Redskins</option></br>
        <option value='Arizona Cardinals'>Arizona Cardinals</option></br>
        <option value='San Francisco 49ers'>San Francisco 49ers</option></br>
        <option value='Seattle Seahawks'>Seattle Seahawks</option></br>
        <option value='St. Louis Rams'>St. Louis Rams</option></br>
        <option value='Chicago Bears'>Chicago Bears</option></br>
        <option value='Detroit Lions'>Detroit Lions</option></br>
        <option value='Green Bay Packers'>Green Bay Packers</option></br>
        <option value='Minnesota Vikings'>Minnesota Vikings</option></br>
        <option value='Atlanta Falcons'>Atlanta Falcons</option></br>
        <option value='Carolina Panthers'>Carolina Panthers</option></br>
        <option value='New Orleans Saints'>New Orleans Saints</option></br>
        <option value='Tampa Bay Buccaneers'>Tampa Bay Buccaneers</option></br>
</td>
        @if((isset($day[$i])))
        @if(($day[$i]->winnerteam)==($day[$i]->hometeam))
        <td><input type="checkbox" name="winnerteam[]" value='{{$day[$i]->hometeam}}' checked></td>        
        @endif      
        @endif
        @if((isset($day[$i])))
        @if(($day[$i]->winnerteam)!=($day[$i]->hometeam))
        <td><input type="checkbox" name="winnerteam[]" value='{{$day[$i]->hometeam}}'></td>
        @endif
        @endif
        @if((!isset($day[$i])))
        <td><input type="checkbox" name="winnerteam[]" value="hometeam[$i]"></td>
        @endif        
<td>vs</td> 
        @if((isset($day[$i])))
        @if(($day[$i]->winnerteam)==($day[$i]->guestteam))
        <td><input type="checkbox" name="winnerteam[]" value='{{$day[$i]->guestteam}}' checked></td>
        @endif
        @endif
        @if((isset($day[$i])))
        @if(($day[$i]->winnerteam)!=($day[$i]->guestteam))
        <td><input type="checkbox" name="winnerteam[]" value='{{$day[$i]->guestteam}}'></td>
        @endif
        @endif
        @if((!isset($day[$i])))
        <td><input type="checkbox" name="winnerteam[]" value="guestteam[$i]"></td>
        @endif
        <td><select name="guestteam[]">
        @if((isset($day[$i])))
        <option value='{{$day[$i]->guestteam}}' selected>{{$day[$i]->guestteam}}</option></br>
        @endif
        <option value='Buffalo Bills'>Buffalo Bills</option></br>
        <option value='Miami Dolphins'>Miami Dolphins</option></br>
        <option value='NE Patriots'>NE Patriots</option></br>
        <option value='New York Jets'>New York Jets</option></br>
        <option value='Denver Broncos'>Denver Broncos</option></br>
        <option value='Kansas City Chiefs'>Kansas City Chiefs</option></br>
        <option value='Oakland Raiders'>Oakland Raiders</option></br>
        <option value='San Diego Chargers'>San Diego Chargers</option></br>
        <option value='Baltimore Ravens'>Baltimore Ravens</option></br>
        <option value='Cincinnati Bengals'>Cincinnati Bengals</option></br>
        <option value='Cleveland Browns'>Cleveland Browns</option></br>
        <option value='Pittsburg Steelers'>Pittsburg Steelers</option></br>
        <option value='Houston Texans'>Houston Texans</option></br>
        <option value='Indianapolis Colts'>Indianapolis Colts</option></br>
        <option value='Jacksonville Jaguars'>Jacksonville Jaguars</option></br>
        <option value='Tennessee Titans'>Tennessee Titans</option></br>
        <option value='Dallas Cowboys'>Dallas Cowboys</option></br>
        <option value='New York Giants'>New York Giants</option></br>
        <option value='Philadelphia Eagles'>Philadelphia Eagles</option></br>
        <option value='Washington Redskins'>Washington Redskins</option></br>
        <option value='Arizona Cardinals'>Arizona Cardinals</option></br>
        <option value='San Francisco 49ers'>San Francisco 49ers</option></br>
        <option value='Seattle Seahawks'>Seattle Seahawks</option></br>
        <option value='St. Louis Rams'>St. Louis Rams</option></br>
        <option value='Chicago Bears'>Chicago Bears</option></br>
        <option value='Detroit Lions'>Detroit Lions</option></br>
        <option value='Green Bay Packers'>Green Bay Packers</option></br>
        <option value='Minnesota Vikings'>Minnesota Vikings</option></br>
        <option value='Atlanta Falcons'>Atlanta Falcons</option></br>
        <option value='Carolina Panthers'>Carolina Panthers</option></br>
        <option value='New Orleans Saints'>New Orleans Saints</option></br>
        <option value='Tampa Bay Buccaneers'>Tampa Bay Buccaneers</option></br>
</td> 
<td>
    @if((isset($day[$i])))
    <input type="text" name="quote_guest[]" value="{{$day[$i]->quote_guest}}"> 
    @endif
    @if((!isset($day[$i])))
    <input type="text" name="quote_guest[]" value="Spread">
    @endif
</td>
</tr>
@endfor
</tbody>
    </table>
<p><td><strong>Jackpot</strong></td></p>
<p><td><input type="text" name="jackpot" value="{{$game->jackpot}}"> </td></p>
@if($game->status=='deadline-over')
<p><td><strong>Winner of the Week</strong></td></p>
<p><td><input type="text" name="Winner" value="{{$game->winner}}"> </td></p>
@endif


{{ Form::hidden('back', URL::previous() ) }}
<div class="btn-group">{{ Form::submit('Save',['class' => 'btn btn-primary ']) }}
</div>
{{ Form::close() }}    
@stop   
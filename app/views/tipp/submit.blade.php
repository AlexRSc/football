@extends('layout.layout')
@section('content')
     {{ Form::open(array('url' => action("TippController@save", array($game->id)),'method' => 'POST')) }}
<h1 style='max-height:300px'> {{$game->week_name}} </h1>
<div class="span11">
    <table class="table table-bordered">
    <thead><tr>
            <th>Spread HomeTeam</th>
            <th>HomeTeam</th>
            <th></th>
            <th>Choose a Winner</th>
            <th></th>
            <th>GuestTeam</th>      
            <th>Spread GuestTeam</th>
            </tr>
    </thead>
    <tbody>
@for($i=0;$i<12;$i++)
<tr>
<td>
    {{$day[$i]->quote_home}}
</td>
<td>{{$day[$i]->hometeam}}
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
    <input type="checkbox" name="winnerteam[]" value='{{$day[$i]->guestteam}}'>    
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
<td>{{$day[$i]->guestteam}}
</td> 
<td>{{$day[$i]->quote_guest}}
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
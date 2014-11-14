@extends('layout.layout')
@section('content')
{{ Form::open(array('url' => action("GameController@lists"),'method' => 'GET')) }}
<h2>{{$game->week_name}}</h2>
<div class="span11">
    <table class="table table-bordered">
        <thead><tr>
                <th>Guest Team</th>                
                <th></th>
                <th>Guest Result</th>
                <th>Spread</th>
                <th>Home Team</th>
                <th></th>
                <th>Home Result</th>
                <th>Spread</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($day as $a)
            <tr>
                @if($a->hometeam==$a->winnerteam)
                <td BGCOLOR="RED">{{$a->guestteam}}</td>
                <td BGCOLOR="RED">
    @if($a->guestteam=='Buffalo Bills')
    {{ HTML::image('img/Bills.png') }}
    @endif
    @if($a->guestteam=='Miami Dolphins')
    {{ HTML::image('img/Dolphins.png') }}
    @endif
    @if($a->guestteam=='NE Patriots')
    {{ HTML::image('img/Patriots.png') }}
    @endif
    @if($a->guestteam=='New York Jets')
    {{ HTML::image('img/Jets.png') }}
    @endif
    @if($a->guestteam=='Denver Broncos')
    {{ HTML::image('img/Broncos.png') }}
    @endif
    @if($a->guestteam=='Kansas City Chiefs')
    {{ HTML::image('img/Chiefs.png') }}
    @endif
    @if($a->guestteam=='Oakland Raiders')
    {{ HTML::image('img/Raiders.png') }}
    @endif
    @if($a->guestteam=='San Diego Chargers')
    {{ HTML::image('img/Chargers.png') }}
    @endif
    @if($a->guestteam=='Baltimore Ravens')
    {{ HTML::image('img/Ravens.png') }}
    @endif
    @if($a->guestteam=='Cincinnati Bengals')
    {{ HTML::image('img/Bengals.png') }}
    @endif
    @if($a->guestteam=='Cleveland Browns')
    {{ HTML::image('img/Browns.png') }}
    @endif
    @if($a->guestteam=='Pittsburg Steelers')
    {{ HTML::image('img/Steelers.png') }}
    @endif
    @if($a->guestteam=='Houston Texans')
    {{ HTML::image('img/Texans.png') }}
    @endif
    @if($a->guestteam=='Indianapolis Colts')
    {{ HTML::image('img/Colts.png') }}
    @endif
    @if($a->guestteam=='Jacksonville Jaguars')
    {{ HTML::image('img/Jaguars.png') }}
    @endif
    @if($a->guestteam=='Tennessee Titans')
    {{ HTML::image('img/Titans.png') }}
    @endif
    @if($a->guestteam=='Dallas Cowboys')
    {{ HTML::image('img/Cowboys.png') }}
    @endif
    @if($a->guestteam=='New York Giants')
    {{ HTML::image('img/Giants.png') }}
    @endif
    @if($a->guestteam=='Philadelphia Eagles')
    {{ HTML::image('img/Eagels.png') }}
    @endif
    @if($a->guestteam=='Washington Redskins')
    {{ HTML::image('img/Redskins.png') }}
    @endif
    @if($a->guestteam=='Arizona Cardinals')
    {{ HTML::image('img/Cardinals.png') }}
    @endif
    @if($a->guestteam=='San Francisco 49ers')
    {{ HTML::image('img/San Francisco.png') }}
    @endif
    @if($a->guestteam=='Seattle Seahawks')
    {{ HTML::image('img/Seahawks.png') }}
    @endif
    @if($a->guestteam=='St. Louis Rams')
    {{ HTML::image('img/Rams.png') }}
    @endif
    @if($a->guestteam=='Chicago Bears')
    {{ HTML::image('img/Bears.png') }}
    @endif
    @if($a->guestteam=='Detroit Lions')
    {{ HTML::image('img/Lions.png') }}
    @endif
    @if($a->guestteam=='Green Bay Packers')
    {{ HTML::image('img/Pakers.png') }}
    @endif
    @if($a->guestteam=='Minnesota Vikings')
    {{ HTML::image('img/Vikings.png') }}
    @endif
    @if($a->guestteam=='Atlanta Falcons')
    {{ HTML::image('img/Falcons.png') }}
    @endif
    @if($a->guestteam=='Carolina Panthers')
    {{ HTML::image('img/Panthers.png') }}
    @endif
    @if($a->guestteam=='New Orleans Saints')
    {{ HTML::image('img/Saints.png') }}
    @endif
    @if($a->guestteam=='Tampa Bay Buccaneers')
    {{ HTML::image('img/Buccaneers.png') }}
    @endif
    </td>
                <td BGCOLOR="RED">{{$a->guest_result}}</td>
                @if($a->quote_guest>0)
                <td BGCOLOR="RED">+{{$a->quote_guest}}</td>
                @else
                <td BGCOLOR="RED">{{$a->quote_guest}}</td>
                @endif
                <td BGCOLOR="#00ff00">{{$a->hometeam}}</td>
                <td BGCOLOR="#00ff00">
    @if($a->hometeam=='Buffalo Bills')
    {{ HTML::image('img/Bills.png') }}
    @endif
    @if($a->hometeam=='Miami Dolphins')
    {{ HTML::image('img/Dolphins.png') }}
    @endif
    @if($a->hometeam=='NE Patriots')
    {{ HTML::image('img/Patriots.png') }}
    @endif
    @if($a->hometeam=='New York Jets')
    {{ HTML::image('img/Jets.png') }}
    @endif
    @if($a->hometeam=='Denver Broncos')
    {{ HTML::image('img/Broncos.png') }}
    @endif
    @if($a->hometeam=='Kansas City Chiefs')
    {{ HTML::image('img/Chiefs.png') }}
    @endif
    @if($a->hometeam=='Oakland Raiders')
    {{ HTML::image('img/Raiders.png') }}
    @endif
    @if($a->hometeam=='San Diego Chargers')
    {{ HTML::image('img/Chargers.png') }}
    @endif
    @if($a->hometeam=='Baltimore Ravens')
    {{ HTML::image('img/Ravens.png') }}
    @endif
    @if($a->hometeam=='Cincinnati Bengals')
    {{ HTML::image('img/Bengals.png') }}
    @endif
    @if($a->hometeam=='Cleveland Browns')
    {{ HTML::image('img/Browns.png') }}
    @endif
    @if($a->hometeam=='Pittsburg Steelers')
    {{ HTML::image('img/Steelers.png') }}
    @endif
    @if($a->hometeam=='Houston Texans')
    {{ HTML::image('img/Texans.png') }}
    @endif
    @if($a->hometeam=='Indianapolis Colts')
    {{ HTML::image('img/Colts.png') }}
    @endif
    @if($a->hometeam=='Jacksonville Jaguars')
    {{ HTML::image('img/Jaguars.png') }}
    @endif
    @if($a->hometeam=='Tennessee Titans')
    {{ HTML::image('img/Titans.png') }}
    @endif
    @if($a->hometeam=='Dallas Cowboys')
    {{ HTML::image('img/Cowboys.png') }}
    @endif
    @if($a->hometeam=='New York Giants')
    {{ HTML::image('img/Giants.png') }}
    @endif
    @if($a->hometeam=='Philadelphia Eagles')
    {{ HTML::image('img/Eagels.png') }}
    @endif
    @if($a->hometeam=='Washington Redskins')
    {{ HTML::image('img/Redskins.png') }}
    @endif
    @if($a->hometeam=='Arizona Cardinals')
    {{ HTML::image('img/Cardinals.png') }}
    @endif
    @if($a->hometeam=='San Francisco 49ers')
    {{ HTML::image('img/San Francisco.png') }}
    @endif
    @if($a->hometeam=='Seattle Seahawks')
    {{ HTML::image('img/Seahawks.png') }}
    @endif
    @if($a->hometeam=='St. Louis Rams')
    {{ HTML::image('img/Rams.png') }}
    @endif
    @if($a->hometeam=='Chicago Bears')
    {{ HTML::image('img/Bears.png') }}
    @endif
    @if($a->hometeam=='Detroit Lions')
    {{ HTML::image('img/Lions.png') }}
    @endif
    @if($a->hometeam=='Green Bay Packers')
    {{ HTML::image('img/Pakers.png') }}
    @endif
    @if($a->hometeam=='Minnesota Vikings')
    {{ HTML::image('img/Vikings.png') }}
    @endif
    @if($a->hometeam=='Atlanta Falcons')
    {{ HTML::image('img/Falcons.png') }}
    @endif
    @if($a->hometeam=='Carolina Panthers')
    {{ HTML::image('img/Panthers.png') }}
    @endif
    @if($a->hometeam=='New Orleans Saints')
    {{ HTML::image('img/Saints.png') }}
    @endif
    @if($a->hometeam=='Tampa Bay Buccaneers')
    {{ HTML::image('img/Buccaneers.png') }}
    @endif
    </td> 
                <td BGCOLOR="#00ff00">{{$a->home_result}}</td>
                @if($a->quote_home>0)
                <td BGCOLOR="#00ff00">+{{$a->quote_home}}</td>
                @else
                <td BGCOLOR="#00ff00">{{$a->quote_home}}</td>
                @endif
                @endif
                @if($a->guestteam==$a->winnerteam)
                <td BGCOLOR="#00ff00">{{$a->guestteam}}</td>
                <td BGCOLOR="#00ff00">
    @if($a->guestteam=='Buffalo Bills')
    {{ HTML::image('img/Bills.png') }}
    @endif
    @if($a->guestteam=='Miami Dolphins')
    {{ HTML::image('img/Dolphins.png') }}
    @endif
    @if($a->guestteam=='NE Patriots')
    {{ HTML::image('img/Patriots.png') }}
    @endif
    @if($a->guestteam=='New York Jets')
    {{ HTML::image('img/Jets.png') }}
    @endif
    @if($a->guestteam=='Denver Broncos')
    {{ HTML::image('img/Broncos.png') }}
    @endif
    @if($a->guestteam=='Kansas City Chiefs')
    {{ HTML::image('img/Chiefs.png') }}
    @endif
    @if($a->guestteam=='Oakland Raiders')
    {{ HTML::image('img/Raiders.png') }}
    @endif
    @if($a->guestteam=='San Diego Chargers')
    {{ HTML::image('img/Chargers.png') }}
    @endif
    @if($a->guestteam=='Baltimore Ravens')
    {{ HTML::image('img/Ravens.png') }}
    @endif
    @if($a->guestteam=='Cincinnati Bengals')
    {{ HTML::image('img/Bengals.png') }}
    @endif
    @if($a->guestteam=='Cleveland Browns')
    {{ HTML::image('img/Browns.png') }}
    @endif
    @if($a->guestteam=='Pittsburg Steelers')
    {{ HTML::image('img/Steelers.png') }}
    @endif
    @if($a->guestteam=='Houston Texans')
    {{ HTML::image('img/Texans.png') }}
    @endif
    @if($a->guestteam=='Indianapolis Colts')
    {{ HTML::image('img/Colts.png') }}
    @endif
    @if($a->guestteam=='Jacksonville Jaguars')
    {{ HTML::image('img/Jaguars.png') }}
    @endif
    @if($a->guestteam=='Tennessee Titans')
    {{ HTML::image('img/Titans.png') }}
    @endif
    @if($a->guestteam=='Dallas Cowboys')
    {{ HTML::image('img/Cowboys.png') }}
    @endif
    @if($a->guestteam=='New York Giants')
    {{ HTML::image('img/Giants.png') }}
    @endif
    @if($a->guestteam=='Philadelphia Eagles')
    {{ HTML::image('img/Eagels.png') }}
    @endif
    @if($a->guestteam=='Washington Redskins')
    {{ HTML::image('img/Redskins.png') }}
    @endif
    @if($a->guestteam=='Arizona Cardinals')
    {{ HTML::image('img/Cardinals.png') }}
    @endif
    @if($a->guestteam=='San Francisco 49ers')
    {{ HTML::image('img/San Francisco.png') }}
    @endif
    @if($a->guestteam=='Seattle Seahawks')
    {{ HTML::image('img/Seahawks.png') }}
    @endif
    @if($a->guestteam=='St. Louis Rams')
    {{ HTML::image('img/Rams.png') }}
    @endif
    @if($a->guestteam=='Chicago Bears')
    {{ HTML::image('img/Bears.png') }}
    @endif
    @if($a->guestteam=='Detroit Lions')
    {{ HTML::image('img/Lions.png') }}
    @endif
    @if($a->guestteam=='Green Bay Packers')
    {{ HTML::image('img/Pakers.png') }}
    @endif
    @if($a->guestteam=='Minnesota Vikings')
    {{ HTML::image('img/Vikings.png') }}
    @endif
    @if($a->guestteam=='Atlanta Falcons')
    {{ HTML::image('img/Falcons.png') }}
    @endif
    @if($a->guestteam=='Carolina Panthers')
    {{ HTML::image('img/Panthers.png') }}
    @endif
    @if($a->guestteam=='New Orleans Saints')
    {{ HTML::image('img/Saints.png') }}
    @endif
    @if($a->guestteam=='Tampa Bay Buccaneers')
    {{ HTML::image('img/Buccaneers.png') }}
    @endif
    </td>
                <td BGCOLOR="#00ff00">{{$a->guest_result}}</td>
                @if($a->quote_guest>0)
                <td BGCOLOR="#00ff00">+{{$a->quote_guest}}</td>
                @else
                <td BGCOLOR="#00ff00">{{$a->quote_guest}}</td>
                @endif
                <td BGCOLOR="RED">{{$a->hometeam}}</td>               
                <td BGCOLOR="RED">
    @if($a->hometeam=='Buffalo Bills')
    {{ HTML::image('img/Bills.png') }}
    @endif
    @if($a->hometeam=='Miami Dolphins')
    {{ HTML::image('img/Dolphins.png') }}
    @endif
    @if($a->hometeam=='NE Patriots')
    {{ HTML::image('img/Patriots.png') }}
    @endif
    @if($a->hometeam=='New York Jets')
    {{ HTML::image('img/Jets.png') }}
    @endif
    @if($a->hometeam=='Denver Broncos')
    {{ HTML::image('img/Broncos.png') }}
    @endif
    @if($a->hometeam=='Kansas City Chiefs')
    {{ HTML::image('img/Chiefs.png') }}
    @endif
    @if($a->hometeam=='Oakland Raiders')
    {{ HTML::image('img/Raiders.png') }}
    @endif
    @if($a->hometeam=='San Diego Chargers')
    {{ HTML::image('img/Chargers.png') }}
    @endif
    @if($a->hometeam=='Baltimore Ravens')
    {{ HTML::image('img/Ravens.png') }}
    @endif
    @if($a->hometeam=='Cincinnati Bengals')
    {{ HTML::image('img/Bengals.png') }}
    @endif
    @if($a->hometeam=='Cleveland Browns')
    {{ HTML::image('img/Browns.png') }}
    @endif
    @if($a->hometeam=='Pittsburg Steelers')
    {{ HTML::image('img/Steelers.png') }}
    @endif
    @if($a->hometeam=='Houston Texans')
    {{ HTML::image('img/Texans.png') }}
    @endif
    @if($a->hometeam=='Indianapolis Colts')
    {{ HTML::image('img/Colts.png') }}
    @endif
    @if($a->hometeam=='Jacksonville Jaguars')
    {{ HTML::image('img/Jaguars.png') }}
    @endif
    @if($a->hometeam=='Tennessee Titans')
    {{ HTML::image('img/Titans.png') }}
    @endif
    @if($a->hometeam=='Dallas Cowboys')
    {{ HTML::image('img/Cowboys.png') }}
    @endif
    @if($a->hometeam=='New York Giants')
    {{ HTML::image('img/Giants.png') }}
    @endif
    @if($a->hometeam=='Philadelphia Eagles')
    {{ HTML::image('img/Eagels.png') }}
    @endif
    @if($a->hometeam=='Washington Redskins')
    {{ HTML::image('img/Redskins.png') }}
    @endif
    @if($a->hometeam=='Arizona Cardinals')
    {{ HTML::image('img/Cardinals.png') }}
    @endif
    @if($a->hometeam=='San Francisco 49ers')
    {{ HTML::image('img/San Francisco.png') }}
    @endif
    @if($a->hometeam=='Seattle Seahawks')
    {{ HTML::image('img/Seahawks.png') }}
    @endif
    @if($a->hometeam=='St. Louis Rams')
    {{ HTML::image('img/Rams.png') }}
    @endif
    @if($a->hometeam=='Chicago Bears')
    {{ HTML::image('img/Bears.png') }}
    @endif
    @if($a->hometeam=='Detroit Lions')
    {{ HTML::image('img/Lions.png') }}
    @endif
    @if($a->hometeam=='Green Bay Packers')
    {{ HTML::image('img/Pakers.png') }}
    @endif
    @if($a->hometeam=='Minnesota Vikings')
    {{ HTML::image('img/Vikings.png') }}
    @endif
    @if($a->hometeam=='Atlanta Falcons')
    {{ HTML::image('img/Falcons.png') }}
    @endif
    @if($a->hometeam=='Carolina Panthers')
    {{ HTML::image('img/Panthers.png') }}
    @endif
    @if($a->hometeam=='New Orleans Saints')
    {{ HTML::image('img/Saints.png') }}
    @endif
    @if($a->hometeam=='Tampa Bay Buccaneers')
    {{ HTML::image('img/Buccaneers.png') }}
    @endif
    </td>
                <td BGCOLOR="RED">{{$a->home_result}}</td>
                @if($a->quote_home>0)
                <td BGCOLOR='RED'>+{{$a->quote_home}}</td>
                @else
                <td BGCOLOR='RED'>{{$a->quote_home}}</td>
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
                <th>Guest Team</th>
                <th>Home Team</th>
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
            @if(($a->winnerteam==$b->winnerteam))
            <tr BGCOLOR="#00ff00">
                <td>{{$a->guestteam}}</td>
                <td>{{$a->hometeam}}</td>
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
    @if($b->winnerteam=='Detroit Lions')
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
            @else
            <tr BGCOLOR="RED">
                <td>{{$a->guestteam}}</td>
                <td>{{$a->hometeam}}</td>
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
    @if($b->winnerteam=='Detroit Lions')
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

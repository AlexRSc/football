<?php

class DayController extends BaseController{

public function create($id)
{
    $game=Game::find($id);
    $day=Day::where('week_id', $id)->get();
    return View::make('Day.create')-> with('game', $game)->with('day', $day);
}

public function results($id)
{   $game=Game::find($id);
    $day=Day::where('week_id', $id)->get();
    $tipp=Tipp::where('week_id', $id)
            ->where('evaluation', 1)->get();
    $loopSize = sizeOf($tipp);
    $amount_user=sizeOf(User::all());
    foreach ($tipp as $a)
    {
        
        
    }
    return View::make('Day.results')->with('tipp', $tipp)->with('game', $game)
        ->with('day', $day);
}

public function save_results($id)
{
    $allInputs = Input::all();
    $home_result = Input::get('home_result');
    $guest_result = Input::get('guest_result');
    $loopSize = sizeOf($home_result);
    $day=Day::where('week_id', $id)->get();
    $tipp=Tipp::where('week_id', $id)->get();
    $game=Game::find($id);
    $i=0;
    foreach($day as $a)
    {
        $a->home_result=$home_result[$i];
        $a->guest_result=$guest_result[$i];
        if($home_result>$guest_result)
            $a->winnerteam=$a->hometeam;
        else
            $a->winnerteam=$a->guestteam;
        $a->save();
        $i++;
        foreach($tipp as $b)
        {
            if($a->winnerteam==$b->winnerteam)
            {
                $b->evaluation='1';
                $b->save();
            }   
        }
    }
    $game->status='results';
    $game->save();
    
    return Redirect::action('GameController@lists');
    }    

public function save($id)
{
    $game=Game::find($id);
    $allInputs = Input::all();
    $hometeam = Input::get('hometeam');
    $guestteam = Input::get('guestteam');
    $quote_home = Input::get('quote_home');
    $quote_guest = Input::get('quote_guest');
    $winnerteam = Input::get('winnerteam');
    $day=Day::where('week_id', $id)->get();
    $winnerSize = sizeOf($winnerteam);
    $loopSize = sizeOf($hometeam);
    $jackpot = Input::get('jackpot');
    
    if(sizeOf($day)!=12)
    {
    for($i=0;$i<$loopSize;$i++)
    {
        $day=new Day();
        $day->hometeam=$hometeam[$i];
        $day->quote_home=$quote_home[$i];
        $day->quote_guest=$quote_guest[$i];
        $day->guestteam=$guestteam[$i];
        $day->week_id=$id;
        if (($game->status=='deadline-over')&&$winnerSize=='12'&&(($winnerteam[$i]=$hometeam[$i])||($winnerteam[$i]=$guestteam[$i])))
        {
            $day->winnerteam=$winnerteam[$i];
        }
        $day->save();
        
    }
    $game->counter=$game->counter+1;
    $game->save();
    }
    elseif(sizeOf($day)==12)
    {
    for($i=0;$i<$loopSize;$i++)
    {
        $day[$i]->hometeam=$hometeam[$i];
        $day[$i]->quote_home=$quote_home[$i];
        $day[$i]->quote_guest=$quote_guest[$i];
        $day[$i]->guestteam=$guestteam[$i];
        $day[$i]->week_id=$id;
        if ($winnerSize=='12'&&(($winnerteam[$i]=$hometeam[$i])||($winnerteam[$i]=$guestteam[$i])))
        {
            $day[$i]->winnerteam=$winnerteam[$i];
        }
        $day[$i]->save();
    }
    }
    $game->jackpot=$jackpot;
    $game->save();
return Redirect::action('GameController@lists');
    
    
}
}

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
    $tipp=Tipp::where('week_id', $id)->get();
    $user=User::all();
    $loopSize = sizeOf($tipp);
    foreach($tipp as $c)
    {
        $c->evaluation=0;
        $c->save();
    }
    foreach($day as $a)
    {
        foreach($tipp as $b)
        {
            if ($b->winnerteam == $a->winnerteam)
            {
                $b->evaluation=1;
                $b->save();
            }
        }
    }
    return View::make('Day.results')->with('tipp', $tipp)->with('game', $game)
        ->with('day', $day)->with('user', $user);
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
    $home_result = Input::get('home_result');
    $guest_result = Input::get('guest_result');
    $winnerteam = Input::get('winnerteam');
    $day=Day::where('week_id', $id)->get();
    $winnerSize = sizeOf($winnerteam);
    $loopSize = sizeOf($hometeam);
    $jackpot = Input::get('jackpot');
    $winner = Input::get('Winner');
    
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
        if ($winnerSize=='12'&&(($winnerteam[$i]=$hometeam[$i])||($winnerteam[$i]=$guestteam[$i])))
        {
            $day->winnerteam=$winnerteam[$i];
        }
        $day->save();
        
    }
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
        if ($winnerSize=='12'&&(($winnerteam[$i]==$hometeam[$i])||($winnerteam[$i]==$guestteam[$i])))
        {            
            $day[$i]->winnerteam=$winnerteam[$i];
        }
        $day[$i]->save();
    }
    }
    
    if(sizeof($home_result)!=0)
    {
        for ($i=0; $i<sizeOf($home_result); $i++)
        {   
            $day[$i]->home_result=$home_result[$i];
            $day[$i]->guest_result=$guest_result[$i];
            if(($home_result[$i]+$quote_home[$i])>$guest_result[$i])
            {    
            $day[$i]->winnerteam=$hometeam[$i];
            }
            else
            {
            $day[$i]->winnerteam=$guestteam[$i];
            }
            $day[$i]->save();
        }
    }
    
    $game->jackpot=$jackpot;
    if(isset($winner))
    {
        $game->Winner=$winner;
    }

    $game->save();
    return Redirect::action('GameController@lists'); 
}
}

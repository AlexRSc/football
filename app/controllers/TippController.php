<?php
class TippController extends BaseController{


public function show($id)
{   $game=Game::find($id);
    $user=User::all();
    $day=Day::where('week_id', $id)->get();
    $tipp=Tipp::where('week_id', $id)->get();
    return View::make('tipp.show')->with('game', $game)->with('day', $day)
        ->with('tipp', $tipp)->with('user', $user);        
}

public function submit($id)
{
    $tipp=Tipp::where('week_id', $id)->where('user_id', Auth::user()->id)
            ->get();
    $game=Game::find($id);
    $day=Day::where('week_id', $id)->get();    
    return View::make('tipp.submit')-> with('game', $game)->with('day', $day)
        ->with('tipp', $tipp);    
}

public function save($id)
{
    $allInputs = Input::all();
    $winnerteam = Input::get('winnerteam');
    $loopSize = sizeOf($winnerteam);
    $day=Day::where('week_id', $id)->get();
    $datetime=new DateTime();
    $already_tipp=Tipp::where('user_id', Auth::user()->id)->get();
    $sizeTipp=sizeOf($already_tipp);
    $game=Game::find($id);
    $time=Game::where('period_end', '<=', $datetime)
                ->get();
        foreach($time as $a)
        {
            if($a->status=='freigeschaltet')
            {
            $a->status='deadline-over';
            $a->save();
            }
        }
    if($game->status=='deadline-over')
    {
        return Redirect::action('GameController@lists')
                ->with('message', 'Deadline over!');
    }
        
    if($loopSize != 5)
    {
        return Redirect::action('TippController@submit', array($id))->withInput()
                ->with('message', 'You have to choose exactly 5 Winners');
            
        }
    for($i=0;$i<$loopSize;$i++)
    {   
        
        foreach ($day as $a)
        {
            if ($winnerteam[$i]==$a->hometeam)
            {
                    for($b=0;$b<$loopSize;$b++)
                    {
                        if($winnerteam[$b]==$a->guestteam)
                        { 
                            return Redirect::action('TippController@submit', array($id))->withInput()
                            ->with('message', 'You chose 2 team from the same match...');
                        }
                    }
            }

        }
    }
    if($sizeTipp!=5)
    {
    for($i=0;$i<$loopSize;$i++)
    {
        $tipp=new Tipp();
        $tipp->winnerteam=$winnerteam[$i];
        $tipp->week_id=$id;
        $tipp->user_id=Auth::user()->id;        
        $tipp->save();
    }
    
        $game->counter=$game->counter+1;
        $game->save();
    
    }
    else
    {
        for($i=0;$i<$loopSize;$i++)
        {
            
        $already_tipp[$i]->winnerteam=$winnerteam[$i];
        $already_tipp[$i]->week_id=$id;
        $already_tipp[$i]->user_id=Auth::user()->id;
        $already_tipp[$i]->save();
        }
    }
    return Redirect::action('GameController@lists');
}
    
}




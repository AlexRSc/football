<?php
class GameController extends BaseController{

    public function lists()
    {
        $game=Game::all();
        $tipp=Tipp::all();
        $datetime=new DateTime();
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
        $times=Game::where('period_start', '<=', $datetime)->get();
        foreach($times as $b)
        {
            if($b->status=='nicht-freigeschaltet')
            {
                $b->status='freigeschaltet';
                $b->save();
            }
        }
        return View::make('game.lists')-> with('game', $game)->with('tipp', $tipp);
    }
    
    public function update()
    {
        $game=new Game();
        $new_game = array(
            'week_name' => Input::get('week_name'), 
            'period_start'   => Input::get('period_start'), 
            'period_end'  => Input::get('period_end') 
        );
        
        $rules = array(
            'week_name' =>  'required',
            'period_start'   =>  'required',
            'period_end'  =>  'required'
        );
        $v = Validator::make($new_game, $rules);
        if($v->fails()) {
            return Redirect::action('UserController@index')
                    ->withErrors($v->messages());
        }
        $game->week_name=$new_game['week_name'];
        $game->period_start=$new_game['period_start'];
        $game->period_end=$new_game['period_end'];
        $game->status= 'nicht-freigeschaltet';
        $game->save();
        
        return Redirect::action('UserController@index');
    }
    
    public function results($id)
    {
        $game=Game::find($id);
        $day=Day::where('week_id', $id)->get();
        $tipp=Tipp::where('week_id', $id)->get();
        return View::make('game.results')->with('game', $game)->with('day', $day)
                ->with('tipp', $day);
    }
    
    public function delete($id)
    {
        $game = Game::find($id);
        Game::destroy($id);
        return Redirect::action('GameController@lists');
    }
    
        
    
    
    public function create()
    {
        return View::make('game.create');   
    }
    
    
    public function status ($id)
    { 
    $game = Game::find($id);
    if($game->status=='nicht-freigeschaltet')
    {
    $game -> status = 'freigeschaltet';
    }
    else
    {
    $game -> status = 'nicht-freigeschaltet';
    }
    $game -> save();
    return Redirect::action('GameController@lists');
    }
}
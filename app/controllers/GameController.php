<?php
class GameController extends BaseController{

    public function lists()
    {
        $game=Game::all();
        foreach ($game as $a)
        {
        $i=0;    
        $tipp=Tipp::where('week_id', $a->id)->get();
        $a->counter=sizeOf($tipp)/5;
        $a->save();
        }
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
        return View::make('game.lists')-> with('game', $game);
    }
    
    public function total()
    {
        $day=Day::all();
        $user=User::where('status', 'freigeschaltet')->get();
        $game=Game::where('status', 'results')->get();
        return View::make('game.total')->with('user', $user)->with('game', $game);
    }
    
    public function status_results($id)
    {
        $game=Game::find($id);        
        if($game->status='deadline-over')
        {
            $game->status='results';
            $game->save();
        }
        
        return Redirect::action('GameController@lists')->with('messages', array(trans('messages.statusresults')));
        
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
            return Redirect::action('GameController@create')->withInput()
                    ->withErrors($v->messages())
                    ->with('messages', array(trans('messages.weekcreationfail')));
        }
        $game->week_name=$new_game['week_name'];
        $game->period_start=$new_game['period_start'];
        $game->period_end=$new_game['period_end'];
        $game->status= 'nicht-freigeschaltet';
        $game->save();
        
        return Redirect::action('GameController@lists')->with('messages', array(trans('messages.weekcreated')));
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
    
    public function save_edit($id)
    {
        $game = Game::find($id);
        return View::make('game.edit')->with('game', $game);
    }
    
    public function game_save($id)
    {
        $game = Game::find($id);
        $new_game = array(
            'week_name'     => Input::get('week_name'), 
            'period_start'  => Input::get('period_start'), 
            'period_end'    => Input::get('period_end') 
        );
        
        $rules = array(
            'week_name'     =>  'required',
            'period_start'  =>  'required',
            'period_end'    =>  'required'
        );
        $v = Validator::make($new_game, $rules);
        if($v->fails()) {
            return Redirect::action('GameController@save_edit', array($id))
                    ->withInput()->withErrors($v->messages())
                    ->with('messages', array(trans('messages.weekeditfail')));
        }
        $game->week_name=$new_game['week_name'];
        $game->period_start=$new_game['period_start'];
        $game->period_end=$new_game['period_end'];
        $game->status= 'nicht-freigeschaltet';
        $game->save();
        
        return Redirect::action('UserController@index')->with('messages', array(trans('messages.weekedited')));
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
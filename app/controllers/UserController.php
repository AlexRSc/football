<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserController extends BaseController 
{
public function index()
{
    $news=News::all();
    $i=0;
    foreach($news as $a)
    {
        $i++;
    }
    return View::make('user.login')->with('news', $news)->with('count', $i);
}

public function login()
{
    $credentials = [
   "username" => Input::get("username"),
   "password" => Input::get("password")
];
if(Auth::attempt($credentials)) {
   return Redirect::intended("/")
           ->with('messages', array(trans('messages.login_succesfull')));
} else {
   return Redirect::action('UserController@index')
           ->with('messages', array(trans('messages.login_failed')));
}
}

public function logout()
{
    Auth::logout();
    return Redirect::action('UserController@index')
            ->with('messages', array(trans('messages.logout')));
}

public function edit()
{
    $user=User::all();
    return View::make('user.lists')->with('user', $user);
}

public function unlock($user_id)
{
    $user = User::find($user_id);
    $user -> status = 'freigeschaltet';
    $user -> save();
    return Redirect::action('UserController@edit');
}

public function lock($user_id)
{
    
    $user = User::find($user_id);
    $user -> status = 'nicht-freigeschaltet';
    $user -> save();
    return Redirect::action('UserController@edit');
}

public function update()
{
    
}
}
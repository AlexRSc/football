<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//alle
Route::get('/', 'UserController@index');
Route::post('register_action', function()
{
    $obj=new RegisterController();
    return $obj->store();
});

Route::get('register', function(){
    return View::make('register');
});
Route::post('/login', 'UserController@login');
Route::get('/logout', 'UserController@logout');
//user
Route::post('/user/update', 'UserController@update');
Route::post('/news/save', 'NewsController@save');
Route::get('/news/delete/{id}', 'NewsController@delete');
Route::get('/game/lists', 'GameController@lists');
Route::get('/tipp/submit/{id}', 'TippController@submit');
Route::get('/tipp/show/{id}', 'TippController@show');
Route::post('/game/update/{id}', 'TippController@save');
Route::post('day/results_save/{id}', 'DayController@save_results');
//admin
Route::group(array('before' => 'admin'), function() {
Route::get('/game/delete/{id}', 'GameController@delete');
Route::get('/user/edit', 'UserController@edit');
Route::get('/user/lock/{id}', 'UserController@lock');
Route::get('user/unlock/{id}', 'UserController@unlock');
Route::get('day/results/{id}', 'DayController@results');
Route::post('/day/update', 'DayController@update');
Route::get('/game/create', 'GameController@create');
Route::post('/game/update', 'GameController@update');
Route::get('/game/status/{id}', 'GameController@status');
Route::get('/game/create/{id}', 'DayController@create');
Route::post('/game/save/{id}', 'DayController@save');
});
?>
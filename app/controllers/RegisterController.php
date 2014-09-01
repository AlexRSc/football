<?php

class RegisterController extends BaseController{
    
    protected $user;
    
    
    
    public function store()
    {
        
        $new_user = array(
            'firstname' => Input::get('firstname'), 
            'surname'   => Input::get('surname'), 
            'username'  => Input::get('user'), 
            'password'  => Input::get('password'),
            'cpassword' => Input::get('cpassword'),            
            'email'     => Input::get('email'),
        );
        
        $rules = array(
            'firstname' =>  'required',
            'surname'   =>  'required',
            'username'  =>  'required|max:255|unique:users',
            'password'  =>  'required|min:6|same:cpassword',
            'cpassword' =>  'required|min:6',
            'email'     =>  'required|max:255|email|unique:users'
        );
        $v = Validator::make($new_user, $rules);
        if($v->fails()) {
            return Redirect::action('UserController@index')
                    ->withErrors($v->messages());
        }
        else
        {
            $user = new User();
            $user -> username = $new_user['username'];
            $user -> email = $new_user['email'];
            $user -> password = Hash::make($new_user['password']);
            $user -> firstname = $new_user['firstname'];
            $user -> surname = $new_user['surname'];
            $user -> status = 'nicht-freigeschaltet';
            $user -> save();
            
            return Redirect::action('UserController@index')
                    ->withMessage('Registration Succesfull!');
        }
    }
}


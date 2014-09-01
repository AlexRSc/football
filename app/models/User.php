<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface{

    public $timestamps = false;
    
    public function reasons ()
    {
        return $this -> hasMany('Reason');
    }
    
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    
    public function getAuthPassword() {
        return $this ->password;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }


    public function setRememberToken($value) {
        $this->remember_token = $value;
    }


    public function getRememberTokenName() {
        return 'remember_token';
    }

}

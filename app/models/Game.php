<?php

class Game extends Eloquent {
    
    protected $table = 'game'; 
    protected $fillable = array('*');
    
    public function days()
    {
        return $this->hasMany('Day');
    }
    
}

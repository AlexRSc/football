<?php

class Game extends Eloquent {
    
    protected $table = 'game'; 
    // Explicitly allow only expected attributes for mass assignment
    protected $fillable = array(
        'week_name',
        'Winner',
        'user',
        'period_start',
        'period_end',
        'jackpot',
        'counter',
        'status'
    );
    
    public function days()
    {
        return $this->hasMany('Day');
    }
    
}

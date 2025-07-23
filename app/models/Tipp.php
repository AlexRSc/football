<?php

class Tipp extends Eloquent {
        protected $table = 'tipp';

        protected $fillable = array(
            'week_id',
            'user_id',
            'winnerteam',
            'evaluation',
            'date'
        );

}


<?php

class Day extends Eloquent {

        protected $table = 'day';

        protected $fillable = array(
            'week_id',
            'hometeam',
            'guestteam',
            'winnerteam',
            'home_result',
            'guest_result',
            'quote_home',
            'quote_guest',
            'date'
        );

}

<?php

class News extends Eloquent {

    protected $fillable = array(
        'user_id',
        'title',
        'content',
        'author'
    );

}
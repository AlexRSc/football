<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    public function up()
    {
             Schema::create('users', function($table) {
             $table->increments('id');
             $table->string('username', 128);
             $table->string('firstname', 128);
             $table->string('surname', 128);
             $table->string('email', 128);
             $table->string('password', 128);
             $table->string('remember_token', 128);
             $table->boolean('admin');
             $table->enum('status', array('freigeschaltet', 'nicht-freigeschaltet')); 
         });
    }

	public function down()
	{
            Schema::drop('users');
	}


}
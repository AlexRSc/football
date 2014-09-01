<?php

use Illuminate\Database\Migrations\Migration;

class CreateGameTable extends Migration {

	public function up()
	{
        Schema::create('game', function($table)
        {

            $table->increments('id');
            $table->string('week_name', 128);
            $table->string('Winner', 128);
            $table->string('user', 128);    
            $table->dateTime('period_start');
            $table->dateTime('period_end');
            $table->float('jackpot');
            $table->int('counter');
            $table->enum('status', array('freigeschaltet', 'nicht-freigeschaltet', 'deadline-over', 'results')); 
            $table->timestamps();
        });
            

        }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}

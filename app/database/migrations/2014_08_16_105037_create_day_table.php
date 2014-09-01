<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{  
        Schema::create('day', function($table)
        {

            $table->increments('id');
            $table->integer('week_id');
            $table->string('hometeam', 128);
            $table->string('guestteam', 128);
            $table->string('winnerteam', 128);
            $table->integer('home_result');
            $table->integer('guest_result');
            $table->float('quote_home');
            $table->float('quote_guest');
            $table->date('date');
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

<?php

use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	public function up()
	{
        Schema::create('news', function($table)
		{
			//
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title', 128);
            $table->string('content', 1000);
            $table->string('author', 50);
            $table->timestamps();
		});
	}

	public function down()
	{
	Schema::drop('news');
	}
}
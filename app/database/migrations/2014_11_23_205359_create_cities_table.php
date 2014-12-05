<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Creates the users table
        Schema::create('cities', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name',20);
            $table->string('translit',20);
            $table->integer('country_id');
            $table->integer('region_id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cities');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Creates the companies table
        Schema::create('companies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
			$table->integer('city_id')->unsigned()->index();
			
            $table->string('name');
			$table->text('description');
			$table->string('tel');
			$table->string('url');
			$table->string('address');
			$table->string('address2');
			$table->string('worktime'); 
			
            $table->timestamps();
			
			//$table->foreign('city_id')->references('id')->on('cities');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies');
	}

}

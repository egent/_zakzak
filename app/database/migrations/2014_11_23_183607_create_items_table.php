<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the `Comments` table
		Schema::create('items', function($table)
		{
            $table->engine = 'InnoDB';
			$table->increments('id')->unsigned();

			$table->integer('city_id')->unsigned()->index();
			
			$table->integer('category_id')->unsigned()->index();
			$table->integer('type_id')->unsigned()->index();			
			
			$table->integer('user_id')->unsigned()->index();
			
			$table->integer('period_id')->unsigned()->index();
			$table->integer('view_id')->unsigned()->index();
			
			$table->string('address');

			$table->string('title');
			
			$table->integer('rooms');
			$table->integer('floor');
			$table->integer('floors');
			$table->integer('space');
			
			$table->integer('price');
			
			$table->text('description');
			$table->integer('building_type');			
			
			$table->string('meta_title');
			$table->string('meta_description');
			$table->string('meta_keywords');
			
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			//$table->foreign('city_id')->references('id')->on('cities');
			//$table->foreign('type_id')->references('id')->on('types');
			//$table->foreign('category_id')->references('id')->on('categories');
			//$table->foreign('building_type')->references('id')->on('building_types');
		});
		
		
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Delete the `Comments` table
		Schema::drop('items');
	}

}

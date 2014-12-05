<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        // Creates the users table
        Schema::create('users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('confirmation_code');
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->timestamps();
        });
		
        // Creates the user_profiles table
        Schema::create('user_profiles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('company_id')->unsigned()->index();			
            $table->string('name');
            $table->string('lastname');
            $table->string('tel');
            $table->boolean('agent');
			$table->text('description');			
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			//$table->foreign('company_id')->references('id')->on('companies');
			
        });

        // Creates password reminders table
        Schema::create('password_reminders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('password_reminders');
		Schema::drop('user_profiles');
        Schema::drop('users');
	}

}

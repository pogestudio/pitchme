<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
	    {
	        $table->unsignedInteger('id',true);
	        $table->string('email')->unique();
	        $table->string('fname');
	        $table->string('lname');
	        $table->string('tel');
	        $table->boolean('accepted_terms')->default(false);
			$table->enum('role', array('vc', 'entrepreneur','panel','admin'))->default('entrepreneur');
	        $table->string('password');
	        $table->string('fb_id');
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
	    Schema::drop('users');
	}

}
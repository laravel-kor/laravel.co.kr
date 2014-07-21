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
      $table->engine = 'InnoDB';
      
      $table->increments('id');
      $table->string('username', 20)->unique();
      $table->string('password', 70);
      $table->string('email')->unique();
      $table->string('nickname', 20)->unique();
      $table->string('about', 100)->nullable();
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
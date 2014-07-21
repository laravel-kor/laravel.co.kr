<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table)
		{
      $table->engine = 'InnoDB';
      
      $table->increments('id');
      $table->string('category');
      $table->string('title');
      $table->text('content');
      $table->integer('views')->default(0);
      $table->integer('user_id')->unsigned();
      $table->timestamps();
      
      $table->foreign('user_id')->references('id')->on('users')->on_update('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
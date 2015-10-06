<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Book;

class CreateLendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lends', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('book_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('book_id')->references('id')->on('books');
			$table->integer('lend_date');
			$table->integer('due_date');
			$table->integer('return_date');
			$table->boolean('continued');
			$table->boolean('is_returned');
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
		Schema::drop('lends');
	}

}

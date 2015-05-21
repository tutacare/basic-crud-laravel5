<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTukangjamusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tukangjamus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama',255);
			$table->string('email',255);
			$table->integer('kualitas_jamu');
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
		Schema::drop('tukangjamus');
	}

}

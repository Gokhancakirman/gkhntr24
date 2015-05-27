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
		Schema::create('yorums', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('yorum');
			$table->string('ad');
			$table->boolean('onay');
			$table->integer('oyun_id');
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
		Schema::drop('yorums');
	}

}

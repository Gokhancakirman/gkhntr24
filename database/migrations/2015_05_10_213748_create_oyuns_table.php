<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOyunsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oyuns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('oyun_adi');
			$table->string('link');
			$table->string('aciklama');
			$table->string('kontroller');
			$table->integer('kat_id');
			$table->string('icon');
			$table->string('resim_yolu1');
			$table->string('resim_yolu2');
			$table->string('resim_yolu3');
			$table->integer('begen');
			$table->integer('dislike');
			$table->integer('sayi');
			$table->boolean('populer');
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
		Schema::drop('oyuns');
	}

}

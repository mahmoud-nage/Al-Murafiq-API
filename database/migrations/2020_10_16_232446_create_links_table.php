<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration {

	public function up()
	{
		Schema::create('links', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name_ar', 191);
			$table->string('name_en', 191);
			$table->string('url', 191);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('links');
	}
}

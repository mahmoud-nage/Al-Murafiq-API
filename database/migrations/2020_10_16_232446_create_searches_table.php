<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchesTable extends Migration {

	public function up()
	{
		Schema::create('searches', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('query');
			$table->bigInteger('count')->default(1);
		});
	}

	public function down()
	{
		Schema::drop('searches');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration {

	public function up()
	{
		Schema::create('cities', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name_ar', 191);
			$table->string('name_en', 191);
			$table->bigInteger('country_id')->unsigned();
			$table->boolean('active')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('cities');
	}
}

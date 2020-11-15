<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration {

	public function up()
	{
		Schema::create('statuses', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name_ar', 191);
			$table->string('name_en', 191);
			$table->tinyInteger('priority')->default('0');
			$table->tinyInteger('type')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('statuses');
	}
}

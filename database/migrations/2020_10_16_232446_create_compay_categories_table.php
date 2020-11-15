<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompayCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('compay_categories', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('company_id')->unsigned();
			$table->bigInteger('category_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('compay_categories');
	}
}

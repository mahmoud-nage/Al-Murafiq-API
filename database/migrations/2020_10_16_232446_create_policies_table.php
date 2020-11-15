<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration {

	public function up()
	{
		Schema::create('policies', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name_ar', 191);
			$table->string('name_en', 191);
			$table->longText('desc_ar');
			$table->longText('desc_en');
			$table->tinyInteger('type')->default('0');
			$table->boolean('active')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('policies');
	}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration {

	public function up()
	{
		Schema::create('socials', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name', 191);
			$table->string('link', 191);
			$table->boolean('active')->default(1);
			$table->longText('icon');
			$table->tinyInteger('icon_type')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('socials');
	}
}

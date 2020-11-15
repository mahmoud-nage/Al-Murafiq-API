<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessSettingsTable extends Migration {

	public function up()
	{
		Schema::create('business_settings', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('type', 191)->unique();
			$table->text('value')->nullable()->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('business_settings');
	}
}

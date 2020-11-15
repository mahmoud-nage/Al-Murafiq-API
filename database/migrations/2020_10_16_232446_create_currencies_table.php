<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration {

	public function up()
	{
		Schema::create('currencies', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name_ar', 191)->unique();
			$table->string('name_en', 191)->unique();
			$table->string('symbol', 191)->nullable();
			$table->boolean('active')->default(1);
			$table->string('country_code', 191)->unique();
			$table->string('country_name', 191)->unique();
			$table->string('dial_code', 191);
			$table->integer('size_phone')->unsigned();
			$table->double('exchange_rate', 10,8)->default('1');
			$table->double('exchange_rate_usd', 10,8)->default('1');
			$table->boolean('default')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('currencies');
	}
}

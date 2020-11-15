<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration {

	public function up()
	{
		Schema::create('addresses', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('area_id')->unsigned()->nullable();
			$table->string('phone', 191);
			$table->text('special_mark')->nullable();
			$table->string('address_details', 191);
			$table->bigInteger('lat')->default('0');
			$table->bigInteger('lon')->default('0');
			$table->boolean('active')->default(1);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('addresses');
	}
}

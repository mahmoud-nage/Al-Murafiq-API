<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffilatesTable extends Migration {

	public function up()
	{
		Schema::create('affilates', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('ssd', 191);
			$table->bigInteger('total_companies')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('affilates');
	}
}

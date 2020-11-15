<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffilateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('affilate_companies', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('company_id')->unsigned();
			$table->bigInteger('affilate_id')->unsigned();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('affilate_companies');
	}
}

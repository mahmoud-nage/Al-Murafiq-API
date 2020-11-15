<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('payment_method_id')->unsigned();
			$table->bigInteger('company_subsription_id')->unsigned();
			$table->double('amount')->default('0');
			$table->longText('payment_details')->nullable();
			$table->boolean('payment_status')->default(0);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('payments');
	}
}

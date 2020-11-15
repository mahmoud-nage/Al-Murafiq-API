<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration {

	public function up()
	{
		Schema::create('tickets', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('code')->unique()->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->string('subject', 191);
			$table->longText('details');
			$table->integer('ticket_status_priority')->default('1');
			$table->boolean('viewed')->default(0);
			$table->tinyInteger('type')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('tickets');
	}
}

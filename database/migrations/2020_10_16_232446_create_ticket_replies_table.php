<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketRepliesTable extends Migration {

	public function up()
	{
		Schema::create('ticket_replies', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('ticket_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->longText('reply');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('ticket_replies');
	}
}

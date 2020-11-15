<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration {

	public function up()
	{
		Schema::create('reviews', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id')->unsigned();
			$table->bigInteger('company_id')->unsigned();
			$table->text('comment');
			$table->boolean('active')->default(0);
			$table->integer('rate');
			$table->bigInteger('likes_count')->default('0');
			$table->bigInteger('dislikens_count')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('reviews');
	}
}

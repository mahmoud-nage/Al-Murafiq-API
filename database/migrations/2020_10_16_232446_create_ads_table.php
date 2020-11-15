<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration {

	public function up()
	{
		Schema::create('ads', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('company_id')->unsigned();
			$table->bigInteger('subscription_id')->unsigned();
			$table->bigInteger('company_subsription_id')->unsigned();
			$table->string('image', 191)->nullable();
			$table->boolean('top')->default(0);
			$table->enum('type', array('banner', 'slider'));
			$table->enum('ad_location', array('category', 'special', 'home'));
			$table->text('url')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('ads');
	}
}

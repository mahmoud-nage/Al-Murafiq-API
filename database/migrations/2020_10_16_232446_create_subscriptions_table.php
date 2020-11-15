<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration {

	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name_ar', 191);
			$table->string('name_en', 191);
			$table->double('price')->default('0');
			$table->integer('days')->default('0');
			$table->boolean('active')->default(1);
			$table->text('desc_ar');
			$table->text('desc_en');
			$table->boolean('top')->default(0);
			$table->integer('slider_num')->default('0');
			$table->integer('banner_num')->default('0');
			$table->bigInteger('total_company')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('subscriptions');
	}
}

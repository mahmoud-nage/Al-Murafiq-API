<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name_ar', 191)->nullable();
			$table->string('name_en', 191)->nullable();
			$table->longText('desc_ar');
			$table->longText('desc_en');
			$table->string('address_ar', 191)->nullable();
			$table->string('address_en', 191)->nullable();
			$table->string('pdf', 191)->nullable();
			$table->integer('branch_num')->default('0');
			$table->boolean('active')->default(0);
			$table->boolean('is_open')->default(1);
			$table->text('closed_reason')->nullable();
			$table->string('open_from', 191);
			$table->string('open_to', 191);
			$table->enum('holiday', array('1', '2', '3', '4', '5', '6', '7'))->nullable();
			$table->bigInteger('parent_id')->unsigned()->default('0');
			$table->string('phone1', 191)->nullable();
			$table->string('phone2', 191)->nullable();
			$table->string('tel', 191)->nullable();
			$table->string('fax', 191)->nullable();
			$table->string('facebook', 191)->nullable();
			$table->string('instagram', 191)->nullable();
			$table->string('twitter', 191)->nullable();
			$table->string('snapshat', 191)->nullable();
			$table->string('whatsapp', 191)->nullable();
			$table->string('googleplus', 191)->nullable();
			$table->string('website', 191)->nullable();
			$table->string('email', 191)->nullable();
			$table->bigInteger('visit_count')->default('0');
			$table->string('lat', 191)->nullable();
			$table->string('lon', 191)->nullable();
			$table->bigInteger('rate_user_count')->default('0');
			$table->bigInteger('total_rating')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('companies');
	}
}

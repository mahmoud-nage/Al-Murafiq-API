<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('provider', 191)->nullable();
			$table->string('provider_id', 191)->nullable();
			$table->string('name', 191);
			$table->bigInteger('userable_id')->unsigned();
			$table->string('userable_type', 191);
			$table->string('email', 191)->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('remember_token', 191)->nullable();
			$table->text('password');
			$table->string('avatar', 191)->nullable();
			$table->date('birth_date')->nullable();
			$table->string('gender', 191)->nullable();
			$table->string('default_lang', 2)->default('ar');
			$table->string('phone', 191)->nullable();
			$table->bigInteger('city_id')->unsigned()->nullable();
			$table->bigInteger('area_id')->unsigned()->nullable();
			$table->bigInteger('zone_id')->unsigned()->nullable();
			$table->string('reset_code', 191)->nullable();
			$table->string('national_id', 191)->nullable();
			$table->string('api_token', 191)->nullable();
			$table->text('fcm_token')->nullable();
			$table->boolean('active')->default(1);
			$table->string('type')->comment('Company, Admin, Staff, Marketer')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}

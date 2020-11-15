<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration {

	public function up()
	{
		Schema::create('files', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('fileable_id')->unsigned();
			$table->string('fileable_type', 191);
			$table->text('source');
			$table->tinyInteger('type')->default('1');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('files');
	}
}

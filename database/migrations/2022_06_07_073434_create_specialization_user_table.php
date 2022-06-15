<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecializationUserTable extends Migration {

	public function up()
	{
		Schema::create('specialization_user', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->bigInteger('specialization_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('specialization_user');
	}
}
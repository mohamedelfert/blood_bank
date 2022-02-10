<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationsTable extends Migration {

	public function up()
	{
		Schema::create('donations', function(Blueprint $table) {
			$table->increments('id');
			$table->string('patient_name');
			$table->string('patient_phone')->unique();
			$table->integer('patient_age');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->integer('client_id')->unsigned();
			$table->integer('bags_num');
			$table->string('hopital_name');
			$table->string('hopital_address');
			$table->decimal('latitude', 10,8);
			$table->decimal('longitude', 10,8);
			$table->longText('details');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donations');
	}
}
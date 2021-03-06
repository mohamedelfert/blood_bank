<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->string('password');
			$table->date('d_o_b');
			$table->integer('blood_type_id')->unsigned();
			$table->date('last_donation_date');
			$table->integer('city_id')->unsigned();
			$table->string('pin_code')->nullable();
			$table->string('api_token',60)->unique()->nullable();
            $table->boolean('is_active')->default(1);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}

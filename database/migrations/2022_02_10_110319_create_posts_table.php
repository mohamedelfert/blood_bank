<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->longText('content');
			$table->string('image')->nullable();
			$table->integer('category_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->date('publish_date');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}

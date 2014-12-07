<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('recipes', function ($table){
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('kitchen_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kitchen_id')->references('id')->on('kitchens');
            $table->foreign('type_id')->references('id')->on('types');
            $table->string('ingredients', 1000);
            $table->string('title', 100);
            $table->integer('time');
            $table->string('description', 1000);
            $table->string('instruction', 1000);
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('recipes');
	}

}

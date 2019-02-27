<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('u_id');
            $table->string('rname')->unique();
            $table->longText('steps');
            $table->string('img_file');
            $table->double('calories');
            $table->double('fat');
            $table->double('carbohydrate');
            $table->double('protein');
            $table->double('sugar');
            $table->boolean('vegan');

        });
        

        Schema::table('recipes', function($table) {
            //$table->unsignedInteger('u_id');


            $table->foreign('u_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}

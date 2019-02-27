<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('r_id');
            $table->unsignedInteger('f_id');
            $table->double('unit');

        });



        Schema::table('ingredients', function($table) {
            //$table->unsignedInteger('r_id');
            //$table->unsignedInteger('f_id');

            $table->foreign('r_id')->references('id')->on('recipes');
            $table->foreign('f_id')->references('id')->on('food');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}

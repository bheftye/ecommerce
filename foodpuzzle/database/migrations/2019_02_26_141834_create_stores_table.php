<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('su_id');
            $table->string('store');
            $table->string('lat');
            $table->string('lon');
            $table->integer('place_id');
            
        });


        Schema::table('stores', function($table) {
            //$table->unsignedInteger('su_id');


            $table->foreign('su_id')->references('id')->on('supermarkets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}

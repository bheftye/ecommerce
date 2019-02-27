<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy', function (Blueprint $table) {
            $table->unsignedInteger('f_id');
            $table->unsignedInteger('st_id');
        });


        Schema::table('buy', function($table) {
            //$table->unsignedInteger('f_id');
            //$table->unsignedInteger('st_id');


            $table->foreign('f_id')->references('id')->on('food');
            $table->foreign('st_id')->references('id')->on('stores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy');
    }
}

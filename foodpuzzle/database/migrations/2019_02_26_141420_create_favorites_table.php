<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {

            $table->unsignedInteger('u_id');
            $table->unsignedInteger('r_id');
        });

        
        Schema::table('favorites', function($table) {
            //$table->unsignedInteger('u_id');
            //$table->unsignedInteger('r_id');

            $table->foreign('u_id')->references('id')->on('users');
            $table->foreign('r_id')->references('id')->on('recipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}

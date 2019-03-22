<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeingKeysIngredientsFood extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function($table) {

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

        Schema::table('ingredients', function($table) {
            $table->dropForeign('ingredients_r_id_foreign');
            $table->dropForeign('ingredients_f_id_foreign');
        });

    }
}

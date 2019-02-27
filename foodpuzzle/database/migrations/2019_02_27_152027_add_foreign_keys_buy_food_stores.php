<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysBuyFoodStores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buy', function($table) {
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
        Schema::table('buy', function($table) {
            $table->dropForeign('buy_food_id_foreign');
            $table->dropForeign('buy_store_id_foreign');
        });

    }
}

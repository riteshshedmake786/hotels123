<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCostToIncludeHotelMenuMetaData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('include_hotel_menu_meta_data', function (Blueprint $table) {
            $table->Integer('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('include_hotel_menu_meta_data', function (Blueprint $table) {
            $table->dropColumn('cost');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCapacityValueToHotelCapacityAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotel_capacity_attribute', function (Blueprint $table) {
            $table->integer('capacity_value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotel_capacity_attribute', function (Blueprint $table) {
            $table->dropColumn('capacity_value');
        });
    }
}

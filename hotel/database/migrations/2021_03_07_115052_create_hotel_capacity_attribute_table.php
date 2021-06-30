<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelCapacityAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_capacity_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('capacity_attribute_id');
            $table->integer('hotel_id');
            $table->integer('hotel_sub_entity_id')->nullable();
            $table->boolean('is_deleted');
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
        Schema::dropIfExists('hotel_capacity_attribute');
    }
}

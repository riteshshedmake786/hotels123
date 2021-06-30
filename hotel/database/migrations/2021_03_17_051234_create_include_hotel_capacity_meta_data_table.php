<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncludeHotelCapacityMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('include_hotel_capacity_meta_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('capacity_attribute_id');
            $table->integer('hotels_sub_entity_id')->nullable();
            $table->text('capacity_value');
            $table->boolean('is_deleted')->default(0);
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
        Schema::dropIfExists('include_hotel_capacity_meta_data');
    }
}

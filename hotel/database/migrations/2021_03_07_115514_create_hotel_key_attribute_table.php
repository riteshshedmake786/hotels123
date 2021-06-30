<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelKeyAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_key_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('key_attribute_ids');
            $table->integer('hotel_id');
            $table->text('description');
            $table->boolean('is_deleted');
            $table->timestamps();
        });
    }

    /**
    hotel_key_attribute  id,  key_attribute_ids,  hotel_id,  description  is_deleted
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_key_attribute');
    }
}

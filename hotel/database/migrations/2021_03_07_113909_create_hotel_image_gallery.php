<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelImageGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_image_gallery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotel_id');
            $table->integer('hotel_sub_entity_id');
            $table->text('image');
            $table->integer('order');
            $table->text('description');
            $table->boolean('is_deleted');
            $table->timestamps();
        });
    }

    /**
    hotel_image_gallary  id  hotel_id,  hotel_sub_entity_id,  image,  order,  description,  is_deleted
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_image_gallery');
    }
}

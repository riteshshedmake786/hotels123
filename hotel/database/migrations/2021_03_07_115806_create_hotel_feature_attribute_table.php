<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelFeatureAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_feature_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('feature_attribute_id');
            $table->integer('hotel_id');
            $table->text('description');
            $table->boolean('is_deleted');
            $table->timestamps();
        });
    }

    /**
    id,  feature_attribute_id,  hotel_id,  description  is_deleted
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_feature_attribute');
    }
}

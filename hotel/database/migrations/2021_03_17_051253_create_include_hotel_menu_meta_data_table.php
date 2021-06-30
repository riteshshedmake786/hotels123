<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncludeHotelMenuMetaDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('include_hotel_menu_meta_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('hotels_sub_entity_id');
            $table->text('title');
            $table->text('image');
            $table->text('doc_file');
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
        Schema::dropIfExists('include_hotel_menu_meta_data');
    }
}

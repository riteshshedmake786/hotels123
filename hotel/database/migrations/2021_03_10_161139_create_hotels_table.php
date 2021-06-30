<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('sub_heading');
            $table->text('location');
            $table->string('long');
            $table->string('lat');
            $table->integer('city');
            $table->text('featured_image');
            $table->integer('state');
            $table->integer('country');
            $table->text('description');
            $table->text('summary');
            $table->enum('added_by',['ADMIN','SUPPLIER','MERCHANT']);
            $table->integer('if_is_admin_id')->nullable();
            $table->integer('if_is_merchant_id')->nullable();
            $table->text('primary_number');
            $table->integer('capacity');
            $table->enum('status',['ACTIVE','INACTIVE','BLOCKED','ONHOLD']);
            $table->boolean('is_deleted');
            $table->boolean('is_featured');
            $table->integer('grade')->nullable();
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
        Schema::dropIfExists('hotels');
    }
}

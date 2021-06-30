<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSupplierProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supplier_profile', function (Blueprint $table) {
            $table->string('services')->nullable();
            $table->string('supported_payment_method')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('you_tube')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('website')->nullable();
            $table->string('brand')->nullable();
            $table->string('line_of_business')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supplier_profile', function (Blueprint $table) {
            $table->dropColumn('services');
            $table->dropColumn('supported_payment_method');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('twitter');
            $table->dropColumn('you_tube');
            $table->dropColumn('email');
            $table->dropColumn('website');
            $table->dropColumn('brand');
            $table->dropColumn('line_of_business');
        });
    }
}

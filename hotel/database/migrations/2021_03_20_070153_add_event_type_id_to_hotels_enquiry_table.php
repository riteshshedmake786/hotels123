<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventTypeIdToHotelsEnquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels_enquiry', function (Blueprint $table) {
            $table->bigInteger('event_type_id')->unsigned()->after('mobile_no')->index();
            $table->foreign('event_type_id')->references('id')->on('event_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels_enquiry', function (Blueprint $table) {
            $table->dropForeign('hotels_enquiry_event_type_id_foreign');
            $table->dropColumn('event_type_id');
        });
    }
}

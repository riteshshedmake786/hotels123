<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIntoHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('long')->nullable()->change();
            $table->string('lat')->nullable()->change();
            $table->integer('capacity')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('long')->change();
            $table->dropColumn('lat')->change();
            $table->dropColumn('capacity')->change();
        });
    }
    public function __construct()
    {
    \Illuminate\Support\Facades\DB::getDoctrineSchemaManager()
       ->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }
}

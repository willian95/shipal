<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourierIdToTypesPackaging extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('types_packaging', function (Blueprint $table) {
            $table->unsignedBigInteger("courier_id");
            $table->foreign("courier_id")->references("id")->on("couriers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('types_packaging', function (Blueprint $table) {
            //
        });
    }
}

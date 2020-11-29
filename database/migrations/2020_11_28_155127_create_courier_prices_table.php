<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_prices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("courier_id");
            $table->unsignedBigInteger("weight_id");
            $table->unsignedBigInteger("zone_id");
            $table->string("account");
            $table->float("courier_price");
            $table->float("shipal_price");
            
            $table->foreign("courier_id")->references("id")->on("couriers");
            $table->foreign("weight_id")->references("id")->on("weights");
            $table->foreign("zone_id")->references("id")->on("zones");

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
        Schema::dropIfExists('courier_prices');
    }
}

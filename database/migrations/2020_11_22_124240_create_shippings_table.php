<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {

            $table->softDeletes();

            $table->id();
            $table->unsignedBigInteger("courier_id");
            $table->unsignedBigInteger("courier_service_id");
            $table->unsignedBigInteger("recipient_id");

            $table->foreign("courier_id")->references("id")->on("couriers");
            $table->foreign("courier_service_id")->references("id")->on("courier_services");
            $table->foreign("recipient_id")->references("id")->on("recipients");

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
        Schema::dropIfExists('shippings');
    }
}

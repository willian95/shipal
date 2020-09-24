<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAndModifyFieldsToTypesPackagingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('types_packaging', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id')->nullable(true)->after('id');

            $table->string('name',100)->nullable(true)->after('user_id');
            
            $table->float('weight', 10, 2)->nullable(true)->change();

            $table->boolean('predetermined')->default(false)->after('weight');//(true para prederterminado, false para no predeterminado)

            //relations
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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

            $table->dropForeign(['user_id']);

            $table->dropColumn('user_id');

            $table->dropColumn('name');

            $table->float('weight', 10, 2)->nullable(false)->change();

            $table->dropColumn('predetermined');

        });
    }
}

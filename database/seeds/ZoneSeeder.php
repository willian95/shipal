<?php

use Illuminate\Database\Seeder;
use App\Zone;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(Zone::count() == 0){

            $table = new Zone;
            $table->id = 1;
            $table->name = "zona 1";
            $table->save();

            $table = new Zone;
            $table->id = 2;
            $table->name = "zona 2";
            $table->save();

            $table = new Zone;
            $table->id = 3;
            $table->name = "zona 3";
            $table->save();

            $table = new Zone;
            $table->id = 4;
            $table->name = "zona 4";
            $table->save();

            $table = new Zone;
            $table->id = 5;
            $table->name = "zona 5";
            $table->save();

            $table = new Zone;
            $table->id = 6;
            $table->name = "zona 6";
            $table->save();

            $table = new Zone;
            $table->id = 7;
            $table->name = "zona 7";
            $table->save();

            $table = new Zone;
            $table->id = 8;
            $table->name = "zona 8";
            $table->save();

        }

    }
}

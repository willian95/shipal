<?php

use Illuminate\Database\Seeder;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plans = DB::table('plans')->count();

        if($plans==0){
            

            $plans = [
                ['name' => 'Profesional'],
                ['name' => 'Premium'],
            ];

            DB::table('plans')->insert($plans);

        }//if($plans==0)

    }
}

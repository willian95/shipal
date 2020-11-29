<?php

use Illuminate\Database\Seeder;
use App\Weight;
class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Weight::count() == 0){

            $i = 0;
            while($i < 70.5){

                if($i > 0){
                    $weight = new Weight;
                    $weight->weight = $i;
                    $weight->save();
                }

                $i = $i + 0.5;

            }

        }
    }
}

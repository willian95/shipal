<?php

use Illuminate\Database\Seeder;

class ConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = DB::table('configs')->count();

        if($configs==0){
            

            $configs = [
                ['min_label_amount' => '10', 'max_label_amount' => '200', 'label_price' => '5'],
            ];

            DB::table('configs')->insert($configs);

        }//if($configs==0)
    }
}

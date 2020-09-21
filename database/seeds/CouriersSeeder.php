<?php

use Illuminate\Database\Seeder;

class CouriersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $couriers = DB::table('couriers')->count();

        if($couriers==0){
            
            //DB::table('couriers')->truncate();

            $couriers = [
                ['name' => 'DHL', 'logo' => 'assets/img/logosCourier/CF2F0F59-4919-4249-BB37-D12411C80CA3.png'],
                ['name' => 'FEDEX', 'logo' => 'assets/img/logosCourier/57447784-2BC2-4173-9C31-A0F11CFDF050.png'],
                ['name' => 'UPS', 'logo' => 'assets/img/logosCourier/D1EC6D6B-34B9-4043-B058-A0EAB01236B8.png'],
            ];

            DB::table('couriers')->insert($couriers);

        }//if($couriers==0)

    }
}

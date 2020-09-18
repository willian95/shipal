<?php

use Illuminate\Database\Seeder;

class CourierServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courier_services = DB::table('couriers')->count();

        if($courier_services==0){


            DB::table('courier_services')->truncate();

            $courier_services = [
                ['courier_id' => '1', 'service_name' => 'Express', 'shipping_time' => '1 día'],
                ['courier_id' => '2', 'service_name' => 'Express', 'shipping_time' => '1 día'],
                ['courier_id' => '1', 'service_name' => 'In-ground', 'shipping_time' => '3-4 días'],
                ['courier_id' => '3', 'service_name' => 'Express', 'shipping_time' => '1 día'],
                ['courier_id' => '1', 'service_name' => 'International', 'shipping_time' => '4-6 días'],
                ['courier_id' => '3', 'service_name' => 'In-ground', 'shipping_time' => '2-3 días'],
                ['courier_id' => '2', 'service_name' => 'In-ground', 'shipping_time' => '2-3 días'],
                ['courier_id' => '3', 'service_name' => 'International', 'shipping_time' => '3-5 días'],
                ['courier_id' => '2', 'service_name' => 'International', 'shipping_time' => '3-4 días'],
            ];

            DB::table('courier_services')->insert($courier_services);

        }//if($courier_services==0)

    }
}

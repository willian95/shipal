<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(CouriersSeeder::class);
        $this->call(CourierServicesSeeder::class);
        $this->call(AssignCouriersSeeder::class);
        $this->call(ConfigsSeeder::class);
        $this->call(PlansSeeder::class);
    }
}

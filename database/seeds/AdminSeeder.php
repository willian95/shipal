<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        if(User::where("email", "admin@gmail.com")->count() == 0){
            $user = new User;
            $user->name = "Admin";
            $user->lastname = "Admin";
            $user->email = "admin@gmail.com";
            $user->business_name = "admin";
            $user->password = bcrypt("12345678");
            $user->email_verified_at="2020-11-18";
            $user->role_id= 1;
            $user->save();
        }

    }
}

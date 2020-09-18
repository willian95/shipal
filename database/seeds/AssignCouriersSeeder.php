<?php

use Illuminate\Database\Seeder;

use App\User;

use App\Courier;

use App\CourierUser;

class AssignCouriersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Users=User::orderBy('id','asc')->get();

        foreach($Users as $User){

            $Couriers=Courier::orderBy('id','asc')->get();
            
            foreach($Couriers as $Courier){


                if (!CourierUser::where("user_id", $User->id)->where("courier_id", $Courier->id)->first()){

                    $create=CourierUser::create([
                        'user_id'=>$User->id,
                        'courier_id'=>$Courier->id
                    ]);

                }//if (count($CourierUser)==0)

            }//foreach($Couriers as $Courier)

        }//foreach($Users as $User)

    }
}

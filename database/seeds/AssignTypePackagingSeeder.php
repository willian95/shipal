<?php

use Illuminate\Database\Seeder;

use App\User;

use App\TypePackaging;

class AssignTypePackagingSeeder extends Seeder
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

            $TypePackaging=TypePackaging::orderBy('id','asc')->where('user_id',null)->get();
            
            foreach($TypePackaging as $Packaging){

                $typesPackagingResult=TypePackaging::where('id',$Packaging->id)->update(['user_id' => $User->id,'name'=>'Personalizada '.$Packaging->length.' x '.$Packaging->width.' x '.$Packaging->height]);

            }//foreach($TypePackaging as $Packaging)

        }//foreach($Users as $User)
    }
}

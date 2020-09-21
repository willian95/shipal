<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Validator;

use App\Config;

use App\Plan;

use App\PlanUser;

use Carbon\Carbon;


class PlanController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {

        $this->middleware('auth');

    }//public function __construct()

    function index(){ 
        

        $Config=Config::orderBy('id','asc')->first();

        return view('plan')->with(['Config'=>json_encode($Config)]);
        

    }//function index()

    function addPlan(Request $request){

        try{
            
            $now= Carbon::now()->format('Y-m-d');

            $expiration_date=Carbon::now()->addDay(30)->format('Y-m-d');

            $planUser=$request->planUser;

            $planUser = array_merge($planUser, ['user_id'=>auth()->id()]);

            $planUser = array_merge($planUser, ['plan_id'=>1]);
                        
            $planUser = array_merge($planUser, ['expiration_date'=>$expiration_date]);


            $search = PlanUser::where('user_id',auth()->id())->where('expiration_date','>',$now)->first();

            if (!empty($search)) {

                return response()->json(["success" => false, "msg" => "Estimado cliente, ya posee un plan activo!"]);

            }else{

                $planUserResult=PlanUser::create($planUser);

                return response()->json(["success" => true, "msg" => "Se registraron los datos exitosamente!"]);

            }//else


        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

    }// function addPlan(Request $request)


}

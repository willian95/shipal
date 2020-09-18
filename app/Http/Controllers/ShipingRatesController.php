<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Validator;

use App\CourierUser;


class ShipingRatesController extends Controller
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

        $CourierUsers=CourierUser::query()->where('user_id',auth()->id())->select(['id','user_id','courier_id'])->orderBy('id','ASC');

        $CourierUsers= $CourierUsers->with([

              'CourierService.couriers' => function($query){

                  $query->select('id','name','logo',)->orderBy('id','ASC');

              },

              'CourierService' => function($query){

                  $query->select('id','courier_id','service_name','shipping_time')->orderBy('id','ASC');

              },


        ])->get(['id','user_id','courier_id']);
        
        
        return view('shipingRates')->with(['CourierService'=>json_encode($this->organizeDataCourierService($CourierUsers))]);

    }//function index()

    public function organizeDataCourierService($CourierUsers){

        $data=array();

        foreach($CourierUsers as $CourierUser){

            if($CourierUser->CourierService!=null){

              foreach($CourierUser->CourierService as $CourierService){

                $data[]=[
                    'CourierServiceId'=>$CourierService->id,
                    'courier_id'=>$CourierService->courier_id,
                    'name'=>$CourierService->couriers->name,
                    'logo'=>$CourierService->couriers->logo,
                    'service_name'=>$CourierService->service_name,
                    'shipping_time'=>$CourierService->shipping_time,
                    'price'=>number_format((rand(200000, 500000)),2,",","."),
                ];

              }//foreach($CourierUser->CourierService as $CourierService)

            }//if($CourierUser->CourierService!=null)

        }//foreach($CourierUsers as $CourierUser)
      
        return $data;

    }//function organizeData()

    function shipingRates(Request $request){

        try{
            
            $Shipping=Session::get('Shipping');

            $Shipping['step']=3;

            $Shipping['shipingRates']=$request->shipingRates;

            Session::put('Shipping',$Shipping);

            return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)

    }//function shipingRates(Request $request)

}

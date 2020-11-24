<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Validator;

use App\CourierUser;
use App\Shipping;
use App\Recipient;


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

                  $query->select('id','name','logo')->orderBy('id','ASC');

              },

              'CourierService' => function($query){

                  $query->select('id','courier_id','service_name','shipping_time')->orderBy('id','ASC');

              },


        ])->get(['id','user_id','courier_id']);

        return view('shipingRates')->with(['CourierService'=>json_encode($this->organizeDataCourierService($CourierUsers))]);

    }//function index()

    function indexInternational(){ 

        $CourierUsers=CourierUser::query()->where('user_id',auth()->id())->select(['id','user_id','courier_id'])->orderBy('id','ASC');

        $CourierUsers= $CourierUsers->with([

              'CourierService.couriers' => function($query){

                  $query->select('id','name','logo')->orderBy('id','ASC');

              },

              'CourierService' => function($query){

                  $query->select('id','courier_id','service_name','shipping_time')->orderBy('id','ASC');

              },


        ])->get(['id','user_id','courier_id']);

        return view('shipingRatesInternational')->with(['CourierService'=>json_encode($this->organizeDataCourierService($CourierUsers))]);

    }//function indexInternational()

    

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

            if($request->international==0){
            
                $Shipping=Session::get('Shipping');

                $Shipping['step']=3;

                $Shipping['shipingRates']=$request->shipingRates;

                Session::put('Shipping',$Shipping);

                $shippingSession = Session::get("Shipping");

                if($request->opt == 1){
                    $shipping = new Shipping;
                    $shipping->courier_service_id = $request->shipingRates["courierService"]["CourierServiceId"];
                    $shipping->courier_id = $request->shipingRates["courierService"]["courier_id"];
                    $shipping->recipient_id = Recipient::where("email", $shippingSession["receiver"]["email"])->first()->id;
                    $shipping->user_id = \Auth::user()->id;
                    $shipping->save();

                    return response()->json(["success" => true, "msg" => "Envío guardado exitosamente!"]);

                }

            }else{

                $ShippingInternational=Session::get('ShippingInternational');

                $ShippingInternational['step']=3;

                $ShippingInternational['shipingRates']=$request->shipingRates;

                Session::put('ShippingInternational',$ShippingInternational);

            }//else
            

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)

    }//function shipingRates(Request $request)

}

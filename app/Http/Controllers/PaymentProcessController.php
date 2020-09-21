<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Validator;

class PaymentProcessController extends Controller
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

        return view('paymentProcess'); 

    }//function index()

    function indexInternational(){ 

        return view('paymentProcessInternational'); 

    }//function indexInternational()

    function paymentProcess(Request $request){
      
        try{
            
            if($request->international==0){

                $Shipping=Session::get('Shipping');

                $Shipping['step']=4;

                $Shipping['shipingRates']=$request->shipingRates;

                $Shipping['payments']=$request->paymentProcess;

                Session::put('Shipping',$Shipping);

            }else{

                $ShippingInternational=Session::get('ShippingInternational');

                $ShippingInternational['step']=4;

                $ShippingInternational['shipingRates']=$request->shipingRates;

                $ShippingInternational['payments']=$request->paymentProcess;

                Session::put('ShippingInternational',$ShippingInternational);

            }//else

            return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)
  
    }//function paymentProcess(Request $request)

}

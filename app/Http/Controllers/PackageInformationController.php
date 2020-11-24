<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PackageInformationRequest;

use App\TypePackaging;

use Session;

use Validator;

use Carbon\Carbon;

class PackageInformationController extends Controller
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

        $TypesPackaging=TypePackaging::orderBy('id','asc')->get();
        $time = Carbon::now()->format("H");
        $date = Carbon::now()->format("Y-m-d");

        return view("packageInfomation")->with(['TypesPackaging'=>json_encode($TypesPackaging), "time" => intval($time), "date" => $date]);

    }//function index()

    function indexInternational(){

        $TypesPackaging=TypePackaging::orderBy('id','asc')->get();

        return view("packageInfomationInternational")->with(['TypesPackaging'=>json_encode($TypesPackaging)]);

    }//function index()

    function packageInformation(PackageInformationRequest $request){

        try{

            $typesPackaging=$request->typesPackaging;
            

            if($typesPackaging['id']!=null){
                
                $typesPackagingResult=TypePackaging::find($typesPackaging['id']);

                if (!empty($typesPackagingResult)) {

                    $typesPackagingResult->fill($typesPackaging)->save();

                }else{

                    $typesPackagingResult=TypePackaging::create($typesPackaging);

                }//else
            }else{

                $typesPackagingResult=TypePackaging::create($typesPackaging);
                
            }//else

            if($request->international==0){

                $Shipping=Session::get('Shipping');

                $Shipping['step']=2;

                $Shipping['typePackaging']=$typesPackagingResult;

                $Shipping['packageInformation']=$request->packageInformation;

                Session::put('Shipping',$Shipping);
    
            }else{

                $ShippingInternational=Session::get('ShippingInternational');

                $ShippingInternational['step']=2;

                $ShippingInternational['typePackaging']=$typesPackagingResult;

                $ShippingInternational['packageInformation']=$request->packageInformation;

                Session::put('ShippingInternational',$ShippingInternational);

            }//else



            
           $TypesPackaging=TypePackaging::orderBy('id','asc')->get();

            return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!","TypesPackaging"=>$TypesPackaging]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)

    }//function packageInformation()
}

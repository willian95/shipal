<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourierPriceStoreRequest;
use App\Imports\CourierPriceImport;
use App\CourierPrice;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class CourierPriceController extends Controller
{
    
    function index(){
        return view("admin.courierPrices.index");
    }

    function store(CourierPriceStoreRequest $request){

        try{

            $imageData = $request->get('file');

            $data = explode( ',', $imageData);
            $fileName = uniqid() . '.'."xlsx";
            $ifp = fopen($fileName, 'wb' );
            fwrite($ifp, base64_decode( $data[1] ) );
            rename($fileName, 'uploads/excel/'.$fileName);

            Excel::import(new CourierPriceImport($request->courierId), public_path('/uploads/excel').'/'.$fileName);

            return response()->json(["success" => true, "msg" => "Zonas cargadas"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Hubo un problema","err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function fetch($page = 1){

        try{

            $dataAmount = 40;
            $skip = ($page - 1) * $dataAmount;

            $courierPrices = CourierPrice::skip($skip)->take($dataAmount)->with("courier", "weight")->orderBy("zone_id")->get();
            $courierPricesCount = CourierPrice::count();

            return response()->json(["success" => true, "courierPrices" => $courierPrices, "courierPricesCount" => $courierPricesCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Ha ocurrido un problema"]);
        }

    }

}

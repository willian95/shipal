<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ZoneStoreRequest;

use App\Country;
use App\Imports\ZoneImport;
use Maatwebsite\Excel\Facades\Excel;

class ZoneController extends Controller
{
    
    function index(){
        return view("admin.zones.index");
    }

    function store(ZoneStoreRequest $request){

        try{

            $imageData = $request->get('file');

            $data = explode( ',', $imageData);
            $fileName = uniqid() . '.'."xlsx";
            $ifp = fopen($fileName, 'wb' );
            fwrite($ifp, base64_decode( $data[1] ) );
            rename($fileName, 'uploads/excel/'.$fileName);

            Excel::import(new ZoneImport, public_path('/uploads/excel').'/'.$fileName);

            return response()->json(["success" => true, "msg" => "Zonas cargadas"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Ha ocurrido un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetch($page = 1){

        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $countries = Country::skip($skip)->take($dataAmount)->orderBy("name")->get();
            $countriesCount = Country::count();

            return response()->json(["success" => true, "countries" => $countries, "countriesCount" => $countriesCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Ha ocurrido un problema"]);
        }

    }

}

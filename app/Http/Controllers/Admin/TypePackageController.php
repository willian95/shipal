<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TypePackageStoreRequest;
use App\Imports\TypePackageImport;
use App\TypePackaging;
use Maatwebsite\Excel\Facades\Excel;

class TypePackageController extends Controller
{
    function index(){

        return view("admin.typePackages.index");

    }

    function store(TypePackageStoreRequest $request){

        try{

            $imageData = $request->get('file');

            $data = explode( ',', $imageData);
            $fileName = uniqid() . '.'."xlsx";
            $ifp = fopen($fileName, 'wb' );
            fwrite($ifp, base64_decode( $data[1] ) );
            rename($fileName, 'uploads/excel/'.$fileName);

            Excel::import(new TypePackageImport($request->courierId), public_path('/uploads/excel').'/'.$fileName);

            return response()->json(["success" => true, "msg" => "PAquetes cargados"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Hubo un problema","err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function fetch($page = 1){

        try{

            $dataAmount = 40;
            $skip = ($page - 1) * $dataAmount;

            $typePackages = TypePackaging::skip($skip)->take($dataAmount)->with("courier")->get();
            $typePackagesCount = TypePackaging::count();

            return response()->json(["success" => true, "typePackages" => $typePackages, "typePackagesCount" => $typePackagesCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Ha ocurrido un problema"]);
        }

    }

}

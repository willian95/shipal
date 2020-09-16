<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TypePackaging;

class TypePackagingController extends Controller
{
    public function index()
    {
        try{

            $TypesPackaging=TypePackaging::orderBy('id','asc')->get();

            return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!","TypesPackaging"=>$TypesPackaging]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)

    }//public function index()

}

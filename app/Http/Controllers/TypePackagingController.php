<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TypePackaging;

use Validator;


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

    public function findTypesPackaging(Request $request)
    {
        try{

            $validator=Validator::make($request->all(), [
                'id'=>'required|integer',
            ],[
                'id.required'=>'El campo id  es requerido',
                'id.integer'=>'El campo id  es invalido',
            ]);

            if ($validator->fails()) {
                return response()->json(["success" => false, "msg" => $validator->errors()]);
            }//if ($validator->fails())

            $TypePackaging=TypePackaging::find($request->id);

            if(!empty($TypePackaging)){

                return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!","TypePackaging"=>$TypePackaging]);

            }//if(!empty($TypePackaging))
            else{

                return response()->json(["success" => false, "msg" =>"No se encontro datos del apodo seleccionado"]);

            }//else
        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)
    }//public function index()

}

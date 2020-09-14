<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Recipient;

use App\Country;

use Validator;

class RecipientController extends Controller
{
    function national(){
        return view('national');
    }

    function international(){
        return view('international');
    }

    public function recipients(Request $request){

        try{


            $validator=Validator::make($request->all(), [
                'is_international'=>'required|boolean',

            ],[
                'is_international.required'=>'Se requiere se indique el campo is_international',
                'is_international.boolean'=>'El campo  is_international debe ser de tipo boolean',
            ]);

            if ($validator->fails()) {
                return response()->json(["success" => false, "msg" => $validator->errors()]);
            }//if ($validator->fails())
        
            $recipients=Recipient::orderBy('name','asc')->where('is_international',$request->is_international)->get();

            return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!","recipients"=>$recipients]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)

    }//public function recipients(Request $request)


}

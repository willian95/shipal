<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function countries(){

        try{

            $countries=Country::orderBy('name','asc')->get();

            return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!","countries"=>$countries]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)

    }//public function countries()

}

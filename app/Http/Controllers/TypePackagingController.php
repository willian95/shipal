<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TypePackagingRequest;

use App\TypePackaging;

use Validator;


class TypePackagingController extends Controller
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

    public function index()
    {
        try{

            $TypesPackaging=TypePackaging::orderBy('id','asc')->where('user_id',auth()->id())->get();

           return view('packaging')->with(['TypesPackaging'=>json_encode($TypesPackaging)]);

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

            $TypePackaging=TypePackaging::where('id',$request->id)->where('user_id',auth()->id())->first();

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

    public function store(TypePackagingRequest $request)
    {

        try{

            $typesPackaging=$request->typesPackaging;
            
            if (!array_key_exists('user_id',  $typesPackaging)) {

                $typesPackaging = array_merge($typesPackaging, ['user_id'=>auth()->id()]);

            }// $typesPackaging

            if($typesPackaging['predetermined']==true || $typesPackaging['predetermined']==1)
                $typesPackaging['predetermined']=1;
            else
                $typesPackaging['predetermined']=0;

            $typesPackagingResult=TypePackaging::create($typesPackaging);

            if($typesPackaging['predetermined']==true || $typesPackaging['predetermined']==1)
                $typesPackagingResult=TypePackaging::where('id','!=',$typesPackagingResult->id)->update(['predetermined' =>0]);

            $TypesPackaging=TypePackaging::where('user_id',auth()->id())->orderBy('id','asc')->get();

            return response()->json(["success" => true, "msg" => "Se registro exitoso!","TypesPackaging"=>$TypesPackaging]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

    }//public function store(TypePackagingRequest $request)


    public function update(TypePackagingRequest $request)
    {

        try{

            $typesPackaging=$request->typesPackaging;
            
            if (!array_key_exists('user_id',  $typesPackaging)) {

                $typesPackaging = array_merge($typesPackaging, ['user_id'=>auth()->id()]);

            }// $typesPackaging

            if($typesPackaging['predetermined']==true || $typesPackaging['predetermined']==1)
                $typesPackaging['predetermined']=1;
            else
                $typesPackaging['predetermined']=0;

             $typesPackagingResult=TypePackaging::find($typesPackaging['id']);

             $typesPackagingResult->fill($typesPackaging)->save();

            if($typesPackaging['predetermined']==true || $typesPackaging['predetermined']==1)
                $typesPackagingResult=TypePackaging::where('id','!=',$typesPackagingResult->id)->update(['predetermined' =>0]);

            $TypesPackaging=TypePackaging::where('user_id',auth()->id())->orderBy('id','asc')->get();

            return response()->json(["success" => true, "msg" => "Se registro exitoso!","TypesPackaging"=>$TypesPackaging]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

    }//public function store(TypePackagingRequest $request)

}

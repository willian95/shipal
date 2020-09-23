<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RecipientsNotebookRequest;

use App\User;

use App\Recipient;

use App\Country;

use Validator;



class MyNotebookController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }//public function __construct()

    function index(){ 

        $recipients=Recipient::query()->where('user_id',auth()->id())->select(['id','user_id','country_id','name','business_name','email','phone','address','address2','city','state','postcode','is_international'])->orderBy('id','ASC');

        $recipients= $recipients->with([

              'countries' => function($query){

                  $query->select('id','code','name',)->orderBy('id','ASC');

              },

        ])->get(['id','user_id','country_id','name','business_name','email','phone','address','address2','city','state','postcode','is_international']);

        $countries=Country::orderBy('name','asc')->get();


        return view('myNotebook')->with(['recipients'=>json_encode($recipients),'countries'=>json_encode($countries)]);

    }//function index()

    function UpdateRecipientsNotebook(RecipientsNotebookRequest $request){

        try{       

                $update=Recipient::find($request->recipient['id']);

                if (!empty($update)) {

                    $update->fill($request->recipient)->save();

                    $recipients=Recipient::query()->where('user_id',auth()->id())->select(['id','user_id','country_id','name','business_name','email','phone','address','address2','city','state','postcode','is_international'])->orderBy('id','ASC');

                    $recipients= $recipients->with([

                        'countries' => function($query){

                            $query->select('id','code','name',)->orderBy('id','ASC');

                        },

                    ])->get(['id','user_id','country_id','name','business_name','email','phone','address','address2','city','state','postcode','is_international']);

                    return response()->json(["success" => true, "msg" => "Actualización exitosa!","recipients"=>$recipients]);

                }else{

                   return response()->json(["success" => false, "msg" => "El directorio que desea actualizar no se encuentra registrado!"]);


                }//else

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }//catch(\Exception $e)

    }//function UpdateRecipientsNotebook(RecipientsNotebookRequest $request)

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Recipient;

use App\Country;

use Validator;

class RecipientController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function createOrUpdateRecipients(Request $request){
        try{
            $validator=Validator::make($request->all(), [
                'sender.name'=>'required',
                'sender.business_name'=>'required',
                'sender.email'=>'required|email',
                'sender.phone'=>'required',
                'sender.address'=>'required',
                'sender.city'=>'required',
                'sender.state'=>'required',
                'sender.is_international'=>'required|boolean',
                'receiver.name'=>'required',
                'receiver.business_name'=>'required',
                'receiver.email'=>'required|email',
                'receiver.phone'=>'required',
                'receiver.address'=>'required',
                'receiver.city'=>'required',
                'receiver.state'=>'required',
                'receiver.is_international'=>'required|boolean',
            ],[
                'sender.name.required'=>'El campo nombre del remitente es requerido',
                'sender.business_name.required'=>'El campo compañia del remitente es requerido',
                'sender.email.required'=>'El campo email del remitente es requerido',
                'sender.email.email'=>'El campo email del remitente es invalido',
                'sender.phone.required'=>'El campo teléfono del remitente es requerido',
                'sender.address.required'=>'El campo dirección del remitente es requerido',
                'sender.city.required'=>'El campo ciudad del remitente es requerido',
                'sender.state.required'=>'El campo apartamento del remitente es requerido',
                'sender.is_international.required'=>'Se requiere se indique el campo is_international',
                'sender.is_international.boolean'=>'El campo  is_international debe ser de tipo boolean',
                'receiver.name.required'=>'El campo nombre del receptor es requerido',
                'receiver.business_name.required'=>'El campo compañia del receptor es requerido',
                'receiver.email.required'=>'El campo email del receptor es requerido',
                'receiver.email.email'=>'El campo email del receptor es invalido',
                'receiver.phone.required'=>'El campo teléfono del receptor es requerido',
                'receiver.address.required'=>'El campo dirección del receptor es requerido',
                'receiver.city.required'=>'El campo ciudad del receptor es requerido',
                'receiver.state.required'=>'El campo apartamento del receptor es requerido',
                'receiver.is_international.required'=>'Se requiere se indique el campo is_international',
                'receiver.is_international.boolean'=>'El campo  is_international debe ser de tipo boolean',
            ]);
            if ($validator->fails()) {
                return response()->json(["success" => false, "msg" => $validator->errors()]);
            }//if ($validator->fails())

            $sender=$request->sender;
            $sender = array_merge($sender, ['user_id'=>auth()->id()]);

            $receiver=$request->receiver;
            $receiver = array_merge($receiver, ['user_id'=>auth()->id()]);

            $senderResult=Recipient::updateOrCreate($sender);
            $receiverResult=Recipient::updateOrCreate($receiver);

            $recipients=Recipient::orderBy('name','asc')->where('is_international',0)->get();

            return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!","recipients"=>$recipients]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)
    }//public function createOrUpdateRecipients(Request $request)


    public function getRecipients(Request $request){
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

            $recipient=Recipient::find($request->id);

            if(!empty($recipient)){
                return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!","recipient"=>$recipient]);
            }//if(count($recipient)>0)
            else{
                return response()->json(["success" => false, "msg" =>"No se encontro datos del apodo seleccionado"]);
            }//else
        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)

    }//public function getRecipients(Request $request)

}

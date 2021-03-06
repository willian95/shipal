<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RecipientCreateOrUpdateRequest;
use App\Http\Requests\RecipientCreateOrUpdateRequestInternational;
use App\User;

use App\Recipient;

use App\Country;

use Session;

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

        $recipients=Recipient::orderBy('name','asc')->where('user_id',auth()->id())->where('is_international',0)->get();
        
        return view('national')->with(['recipients'=>json_encode($recipients)]);

    }

    function international(){

        $recipients=Recipient::orderBy('name','asc')->where('user_id',auth()->id())->where('is_international',1)->get();
                            
        $countries=Country::orderBy('name','asc')->get();

        return view('international')->with(['recipients'=>json_encode($recipients),'countries'=>json_encode($countries)]);

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

    public function createOrUpdateRecipients(RecipientCreateOrUpdateRequest $request){
        try{
            
            $sender=$request->sender;
            $sender = array_merge($sender, ['user_id'=>auth()->id()]);

            $receiver=$request->receiver;
            $receiver = array_merge($receiver, ['user_id'=>auth()->id()]);

            if($sender["email"] == $receiver["email"]){
                return response()->json(["success" => false, "msg" => "El correo de remitente y receptor no pueden ser iguales"]);
            }

            //sender
            if($sender['id']!=null){
                $update=Recipient::find($sender['id']);
                if (!empty($update)) {
                    $update->fill($sender)->save();
                }else{
                    $senderResult=Recipient::create($sender);
                }//else
            }else{
                
                if(Recipient::where("email", $sender['email'])->first()){

                    $update=Recipient::where("email", $sender['email'])->first();
                    $update->fill($sender)->save();

                }else{
                    $senderResult=Recipient::create($sender);
                }

            }//else

            //receiver
            if($receiver['id']!=null){
                $update=Recipient::find($receiver['id']);
                if (!empty($update)) {
                    $update->fill($receiver)->save();
                }else{
                    $receiverResult=Recipient::create($receiver);
                }//else
            }else{

                if(Recipient::where("email", $receiver['email'])->first()){

                    $update=Recipient::where("email", $receiver['email'])->first();
                    $update->fill($receiver)->save();

                }else{
                    $receiverResult=Recipient::create($receiver);
                }

            }//else

            $Shipping=Session::get('Shipping');

            $Shipping['step']=1;
            $Shipping['sender']=$sender;
            $Shipping['receiver']=$receiver;

            Session::put('Shipping',$Shipping);

            $recipients=Recipient::orderBy('name','asc')->where('is_international',$request->opt)->get();

            return response()->json(["success" => true, "msg" => "Obtención de datos exitosa!","recipients"=>$recipients]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }//catch(\Exception $e)
    }//public function createOrUpdateRecipients(Request $request)

    public function createOrUpdateRecipientsInternational(RecipientCreateOrUpdateRequestInternational $request){
        try{
            
            $sender=$request->sender;
            $sender = array_merge($sender, ['user_id'=>auth()->id()]);

            $receiver=$request->receiver;
            $receiver = array_merge($receiver, ['user_id'=>auth()->id()]);

            if($sender["email"] == $receiver["email"]){
                return response()->json(["success" => false, "msg" => "El correo de remitente y receptor no pueden ser iguales"]);
            }
            

            //sender
            if($sender['id']!=null){
                $update=Recipient::find($sender['id']);
                if (!empty($update)) {
                    $update->fill($sender)->save();
                }else{
                    $senderResult=Recipient::create($sender);
                }//else
            }else{
                
                if(Recipient::where("email", $sender['email'])->first()){

                    $update=Recipient::where("email", $sender['email'])->first();
                    $update->fill($sender)->save();

                }else{
                    $senderResult=Recipient::create($sender);
                }

            }//else

            //receiver
            if($receiver['id']!=null){
                $update=Recipient::find($receiver['id']);
                if (!empty($update)) {
                    $update->fill($receiver)->save();
                }else{
                    $receiverResult=Recipient::create($receiver);
                }//else
            }else{

                if(Recipient::where("email", $receiver['email'])->first()){

                    $update=Recipient::where("email", $receiver['email'])->first();
                    $update->fill($receiver)->save();

                }else{
                    $receiverResult=Recipient::create($receiver);
                }

            }//else

            $ShippingInternational=Session::get('ShippingInternational');

            $ShippingInternational['step']=1;

            $ShippingInternational['sender']=$sender;

            $ShippingInternational['receiver']=$receiver;

            Session::put('ShippingInternational',$ShippingInternational);

            $recipients=Recipient::orderBy('name','asc')->where('is_international',$request->opt)->get();

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

    public function SesionShipping(){

      try{

            if(session()->has('Shipping')){

                $Shipping=Session::get('Shipping');

                if($Shipping['step']==0){

                    return response()->json(["success" => false, "msg" =>"No tienes un envio en proceso"]);

                }else{

                    return response()->json(["success" => true, "msg" => "Tienes un envio en proceso","Shipping"=>$Shipping]);


                }//else

            }else{

                Session::put('Shipping',[
                                            'step' => 0,
                                            'sender' => [],
                                            'receiver'=>[],
                                            'typePackaging'=>[],
                                            'packageInformation'=>[],
                                            'shipingRates'=>[],
                                            'payments'=>[],

                                        ]);

                return response()->json(["success" => false, "msg" =>"No tienes un envio en proceso"]);

            }//else
        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
            
        }//catch(\Exception $e)
    }//public function SesionShipping()

    public function SesionShippingInternational(){

      try{

            if(session()->has('ShippingInternational')){

                $ShippingInternational=Session::get('ShippingInternational');

                if($ShippingInternational['step']==0){

                    return response()->json(["success" => false, "msg" =>"No tienes un envio en proceso"]);

                }else{

                    return response()->json(["success" => true, "msg" => "Tienes un envio en proceso","ShippingInternational"=>$ShippingInternational]);


                }//else

            }else{

                Session::put('ShippingInternational',[
                                            'step' => 0,
                                            'sender' => [],
                                            'receiver'=>[],
                                            'typePackaging'=>[],
                                            'packageInformation'=>[],
                                            'shipingRates'=>[],
                                            'payments'=>[],

                                        ]);

                return response()->json(["success" => false, "msg" =>"No tienes un envio en proceso"]);

            }//else
        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
            
        }//catch(\Exception $e)
    }//public function SesionShippingInternational()

}

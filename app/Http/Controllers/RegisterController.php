<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use App\Courier;
use App\CourierUser;

class RegisterController extends Controller
{
    
    function index(){
        return view("register");
    }

    function register(RegisterRequest $request){
        try{

            $registerHash = Str::random(40);

            $user = new User;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->business_name = $request->business_name;
            $user->business_website = $request->business_website;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->register_hash = $registerHash;
            $user->save();
            
            //AssignCouriers
            $this->AssignCouriers($user);

            $data = ["messageMail" => "Hola ".$user->name.", haz click en el siguiente enlace para validar tu cuenta", "registerHash" => $registerHash];
            $to_name = $user->name;
            $to_email = $user->email;

            \Mail::send("emails.verifyMail", $data, function($message) use ($to_name, $to_email) {

                $message->to($to_email, $to_name)->subject("¡Valida tu correo!");
                $message->from( env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

            });

            return response()->json(["success" => true, "msg" => "Te has registrado con éxito, revisa tu correo para validar tu cuenta"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }
    }

    function verify($registerHash){

        try{

            $user = User::where("register_hash", $registerHash)->firstOrFail();
            $user->register_hash = null;
            $user->email_verified_at = Carbon::now();
            $user->update();
            
            return redirect()->to('/')->with('alert', 'Has validado tu cuenta, puedes ingresar a la plataforma');

        }catch(\Exception $e){
            abort(403);
        }

    }

    function AssignCouriers($User){
        
            $Couriers=Courier::orderBy('id','asc')->get();
            
            foreach($Couriers as $Courier){


                if (!CourierUser::where("user_id", $User->id)->where("courier_id", $Courier->id)->first()){

                    $create=CourierUser::create([
                        'user_id'=>$User->id,
                        'courier_id'=>$Courier->id
                    ]);

                }//if (count($CourierUser)==0)

            }//foreach($Couriers as $Courier)

    }//function AssignCouriers($User)

}

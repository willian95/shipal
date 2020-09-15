<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordResetRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use App\PasswordReset;

class ForgotPasswordController extends Controller
{

    function index(){
        return view('forgotpassword');
    }//function index()

    function forgotPasswordReset(ForgotPasswordResetRequest $request){
        try{

            $User = User::where('email',$request->email)->first();

            if (!empty($User)) {

                $forgotPasswordHash = Str::random(40);

                $PasswordReset = PasswordReset::where('email',$request->email)->first();

                if (!empty($PasswordReset)) {

                   $forgotPasswordHash=$PasswordReset->token;

                }else{

                    $PasswordReset=PasswordReset::create([
                        'email'=>$request->email,
                        'token'=>$forgotPasswordHash,
                    ]);

                }//else

                $data = ["messageMail" => "Hola ".$User->name.", haz click en el siguiente enlace para resetear tu cuenta", "forgotPasswordHash" => $User->email.'-'.$forgotPasswordHash];

                    $to_name = $User->name;
                    $to_email = $User->email;

                \Mail::send("emails.resetPassword", $data, function($message) use ($to_name, $to_email) {

                    $message->to($to_email, $to_name)->subject("¡Reseta tu contraseña!");

                    $message->from( env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

                });
                 
                return response()->json(["success" => true, "msg" =>"Por favor revisa tu correo para resetear tu contraseña"]);

            }else{

                return response()->json(["success" => false, "msg" =>"Usuario no registrado!"]);

            }//else


        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }
    }

    function reset($forgotPasswordHash){

        try{

            $validation=explode("-", $forgotPasswordHash);

            $PasswordReset = PasswordReset::where("email", $validation[0])->where("token", $validation[1])->firstOrFail();

            if(!empty($PasswordReset)){

                $PasswordReset->delete();
                
                return view('reset_password')->with(['email'=>$validation[0]]);

            }else{

                return redirect()->to('/')->with('alert', 'Datos invalidos');

            }//else

        }catch(\Exception $e){
            abort(403);
        }

    }

    function resetPassword(ResetPasswordRequest $request){
         
        try{

            $User = User::where('email',$request->email)->first();

             if (!empty($User)) {

               $User->password =  bcrypt($request->password);

               $User->update();

               return response()->json(["success" => true, "msg" =>"Cambio de clave exitosa"]);

             }else{

               return response()->json(["success" => false, "msg" =>"Por favor reintente mas tarde"]);

             }//else


        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }
    }//function resetPassword(ResetPasswordRequest $request)

}//class ForgotPasswordController extends Controller


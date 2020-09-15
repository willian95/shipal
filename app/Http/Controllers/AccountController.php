<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountUpdateRequest;
use App\User;
use Auth;

class AccountController extends Controller
{
    
    function index(){
        return view('account');
    }

    function update(AccountUpdateRequest $request){

        try{

            if(User::where("email", $request->email)->where("id", "<>", \Auth::user()->id)->count() <= 0){

                if(($request->password != "" || $request->password != null) && ($request->new_password != "" || $request->new_password != null)){
                    if (Auth::attempt(['email' => \Auth::user()->email, 'password' => $request->password])) {
                    
                        $user = User::where("id", \Auth::user()->id)->first();
                        $user->email = $request->email;
                        $user->name = $request->name;
                        $user->password = bcrypt($request->new_password);
                        $user->update();
    
                        return response()->json(["success" => true, "msg" => "Has actualizado tu cuenta"]);
    
                    }else{
                        return response()->json(["success" => false, "msg" => "La contraseña utilizada no es la correcta"]);
                    }
                }else{

                    $user = User::where("id", \Auth::user()->id)->first();
                    $user->email = $request->email;
                    $user->name = $request->name;
                    $user->update();

                    return response()->json(["success" => true, "msg" => "Has actualizado tu cuenta"]);

                }
                

            }else{
                return response()->json(["success" => false, "msg" => "Este email ya está utilizado"]);
            }

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Hubo un problema"]);
        }

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountUpdateRequest;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\User;
use Auth;

class AccountController extends Controller
{
    
    function index(){
        return view('account');
    }

    function update(AccountUpdateRequest $request){

        try{

            if($request->get('image') != null){
            
                try{
    
                    $imageData = $request->get('image');
    
                    if(strpos($imageData, "svg+xml") > 0){
    
                        $data = explode( ',', $imageData);
                        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                        $ifp = fopen($fileName, 'wb' );
                        fwrite($ifp, base64_decode( $data[1] ) );
                        rename($fileName, 'images/users/'.$fileName);
        
                    }else{
    
                        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                        Image::make($request->get('image'))->save(public_path('images/users/').$fileName);
                    }
        
                }catch(\Exception $e){
        
                    return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        
                }
            }

            if(User::where("email", $request->email)->where("id", "<>", \Auth::user()->id)->count() <= 0){

                if(($request->password != "" || $request->password != null) && ($request->new_password != "" || $request->new_password != null)){
                    if (Auth::attempt(['email' => \Auth::user()->email, 'password' => $request->password])) {
                    
                        $user = User::where("id", \Auth::user()->id)->first();
                        $user->email = $request->email;
                        $user->name = $request->name;
                        $user->password = bcrypt($request->new_password);
                        if($request->get('image') != null){
                            $user->image = url('/').'/images/users/'.$fileName;
                        }
                        $user->update();
    
                        return response()->json(["success" => true, "msg" => "Has actualizado tu cuenta"]);
    
                    }else{
                        return response()->json(["success" => false, "msg" => "La contraseña utilizada no es la correcta"]);
                    }
                }else{

                    $user = User::where("id", \Auth::user()->id)->first();
                    $user->email = $request->email;
                    $user->name = $request->name;
                    if($request->get('image') != null){
                        $user->image = url('/').'/images/users/'.$fileName;
                    }
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

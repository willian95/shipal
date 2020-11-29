<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CourierStoreRequest;
use App\Http\Requests\CourierUpdateRequest;
use App\Courier;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class CourierController extends Controller
{
    
    function index(){

        return view("admin.couriers.index");

    }

    function fetch($page = 1){

        try{

            $dataAmount = 20;
            $skip = ($page - 1) * $dataAmount;

            $couriers = Courier::skip($skip)->take($dataAmount)->get();
            $couriersCount = Courier::count();

            return response()->json(["success" => true, "couriers" => $couriers, "couriersCount" => $couriersCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Ha ocurrido un problema"]);
        }

    }

    function all(){

        try{

            $couriers = Courier::all();

            return response()->json(["success" => true, "couriers" => $couriers]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Ha ocurrido un problema"]);
        }

    }

    function store(CourierStoreRequest $request){

        try{

            try{
    
                $imageData = $request->get('image');

                if(strpos($imageData, "svg+xml") > 0){

                    $data = explode( ',', $imageData);
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                    $ifp = fopen($fileName, 'wb' );
                    fwrite($ifp, base64_decode( $data[1] ) );
                    rename($fileName, 'uploads/images/couriers/'.$fileName);
    
                }else{

                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                    Image::make($request->get('image'))->save(public_path('uploads/images/couriers/').$fileName);
                }
    
            }catch(\Exception $e){
    
                return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);
    
            }

            $courier = new Courier;
            $courier->name = $request->name;
            $courier->logo = url('/').'/uploads/images/couriers/'.$fileName;
            $courier->save();

            return response()->json(["success" => true, "msg" => "Courier creado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Hubo un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function update(CourierUpdateRequest $request){

        try{

            if($request->get('image') != null){
            
                try{
    
                    $imageData = $request->get('image');
    
                    if(strpos($imageData, "svg+xml") > 0){
    
                        $data = explode( ',', $imageData);
                        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                        $ifp = fopen($fileName, 'wb' );
                        fwrite($ifp, base64_decode( $data[1] ) );
                        rename($fileName, 'uploads/images/couriers/'.$fileName);
        
                    }else{
    
                        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                        Image::make($request->get('image'))->save(public_path('uploads/images/couriers/').$fileName);
                    }
        
                }catch(\Exception $e){
        
                    return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        
                }
            }

            $courier = Courier::where("id", $request->id)->first();
            $courier->name = $request->name;
            if($request->get('image') != null){
                $courier->logo = url('/').'/uploads/images/couriers/'.$fileName;
            }
            $courier->update();

            return response()->json(["success" => true, "msg" => "Courier actualizado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Hubo un problema", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

}

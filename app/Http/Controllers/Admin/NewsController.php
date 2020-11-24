<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Requests\NewsUpdateRequest;
use Carbon\Carbon;
use App\News;

class NewsController extends Controller
{
    
    function create(){

        return view("admin.news.create");

    }

    function list(){

        return view("admin.news.list");

    }

    function edit($id){

        $notice = News::find($id);
        return view("admin.news.edit", ["image" => $notice->image, "text" => $notice->body, "title" => $notice->title, "id" => $notice->id]);

    }

    function store(NewsStoreRequest $request){

        try{

            try{
    
                $imageData = $request->get('image');

                if(strpos($imageData, "svg+xml") > 0){

                    $data = explode( ',', $imageData);
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                    $ifp = fopen($fileName, 'wb' );
                    fwrite($ifp, base64_decode( $data[1] ) );
                    rename($fileName, 'uploads/images/news/'.$fileName);
    
                }else{

                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                    Image::make($request->get('image'))->save(public_path('uploads/images/news/').$fileName);
                }
    
            }catch(\Exception $e){
    
                return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);
    
            }

            $slug = str_replace(" ", "-", $request->title);
            $slug = str_replace("/", "-", $slug);

            if(News::where("slug", $slug)->count() > 0){
                $slug = $slug."-".uniqid();
            }

            $news = new News;
            $news->image = url('/').'/uploads/images/news/'.$fileName;
            $news->title = $request->title;
            $news->body = $request->text;
            $news->slug = $slug;
            $news->save();

            return response()->json(["success" => true, "msg" => "Noticia creada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Error en el servidor"]);
        }

    }

    function update(NewsUpdateRequest $request){

        try{

            if($request->get("image")){
                try{
    
                    $imageData = $request->get('image');
    
                    if(strpos($imageData, "svg+xml") > 0){
    
                        $data = explode( ',', $imageData);
                        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                        $ifp = fopen($fileName, 'wb' );
                        fwrite($ifp, base64_decode( $data[1] ) );
                        rename($fileName, 'uploads/images/news/'.$fileName);
        
                    }else{
    
                        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                        Image::make($request->get('image'))->save(public_path('uploads/images/news/').$fileName);
                    }
        
                }catch(\Exception $e){
        
                    return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        
                }
            }

            $news = News::find($request->id);
            if($request->get("image")){
                $news->image = url('/').'/uploads/images/news/'.$fileName;
            }
            
            $news->title = $request->title;
            $news->body = $request->text;
            $news->update();

            return response()->json(["success" => true, "msg" => "Noticia actualizada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Error en el servidor"]);
        }

    }

    function delete(Request $request){

        try{
            
            $notice = News::find($request->id);
            $notice->delete();

            return response()->json(["success" => true, "msg" => "Noticia eliminada"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Error en el servidor"]);
        }

    }

    function fetch($page = 1){
        try{
            $dataAmount = 10;
            $skip = ($page - 1) * $dataAmount;

            $news = News::skip($skip)->take($dataAmount)->orderBy("id", "desc")->get();
            $newsCount = News::count();

            return response()->json(["success" => true, "news" => $news, "newsCount" => $newsCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Error en el servidor"]);
        }
    }

}

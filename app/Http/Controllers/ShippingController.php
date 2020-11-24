<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;

class ShippingController extends Controller
{
    
    function pendingShippings(){

        $pendingShippings = Shipping::where("is_finished", 0)->where("user_id", \Auth::user()->id)->with("courier", "courierService", "recipient")->get();
        return response()->json(["pendingShippings" => $pendingShippings]);

    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourierPrice extends Model
{
    protected $fillable = [

        "courier_id",
        "weight_id",
        "zone_id",
        "account",
        "courier_price",
        "shipal_price"

    ];

    public function courier(){
        return $this->belongsTo(Courier::class);
    }

    public function weight(){
        return $this->belongsTo(Weight::class);
    }

}

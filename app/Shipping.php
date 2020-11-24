<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use SoftDeletes;

    public function courier(){
        return $this->belongsTo(Courier::class);
    }

    public function courierService(){
        return $this->belongsTo(CourierService::class);
    }

    public function recipient(){
        return $this->belongsTo(Recipient::class);
    }

}

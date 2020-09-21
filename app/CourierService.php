<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourierService extends Model
{
    public $table='courier_services';

    protected $fillable=[
        'courier_id',
        'service_name',
        'shipping_time',
    ];

    public function couriers()
    {
        return $this->belongsTo('App\Courier','courier_id');
    }

}


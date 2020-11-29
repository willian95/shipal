<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public $table='couriers';

    protected $fillable=[
        'name',
        'logo',
    ];


    public function CourierService()
    {
        return $this->belongsTo('App\CourierService','courier_id');
    }

    public function CourierUser()
    {
        return $this->belongsTo('App\CourierUser','courier_id');
    }

    public function CourierPrice(){
        return $this->hasMany(CourierPrice::class);
    }

}

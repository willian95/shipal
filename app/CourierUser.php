<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourierUser extends Model
{
    public $table='courier_users';

    protected $fillable=[
        'user_id',
        'courier_id',
    ];

    public function users()
    {
        return $this->hasMany('App\User','users_id');
    }

    public function couriers()
    {
        return $this->belongsTo('App\Courier','courier_id');
    }

    public function CourierService()
    {
        return $this->hasMany('App\CourierService','courier_id');
    }

}

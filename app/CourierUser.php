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

}

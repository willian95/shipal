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
}

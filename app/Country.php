<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
     public $table='countries';

    protected $fillable=[
        'code',
        'name',
    ];
}

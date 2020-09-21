<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public $table='plans';

    protected $fillable=[
        'name',
    ];
}

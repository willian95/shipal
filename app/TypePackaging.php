<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePackaging extends Model
{
    public $table='types_packaging';

    protected $fillable=[
        'length', 
        'width',
        'height',
        'weight',
    ];

}

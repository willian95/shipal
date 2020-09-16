<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageInformation extends Model
{
    public $table='types_packaging';

    protected $fillable=[
        'length', 
        'width',
        'height',
        'weight',
    ];

}

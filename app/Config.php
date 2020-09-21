<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $table='configs';

    protected $fillable=[
        'min_label_amount',
        'max_label_amount',
        'label_price',
    ];

}

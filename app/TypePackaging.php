<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePackaging extends Model
{
    public $table='types_packaging';

    protected $fillable=[
        'user_id',
        'name',
        'courier_id',
        'length', 
        'width',
        'height',
        'weight',
        'predetermined',
    ];

    public function courier(){
        return $this->belongsTo(Courier::class);
    }

}

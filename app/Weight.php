<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    public function CourierPrice(){
        return $this->hasMany(CourierPrice::class);
    }
}

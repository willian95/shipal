<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanUser extends Model
{
    public $table='plan_users';

    protected $fillable=[
        'user_id',
        'plan_id',
        'label_amount',
        'expiration_date',
    ];


}

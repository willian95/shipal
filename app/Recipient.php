<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{

    public $table='recipients';

    protected $fillable=[
        'user_id',
        'country_id',
        'name',
        'business_name',
        'email',
        'phone',
        'address',
        'address2',
        'city',
        'state',
        'postcode',
        'is_international',//(true para internacional, false para nacional)
    ];

    public function users()
    {
        return $this->belongsTo('App\User','users_id');
    }

    public function countries()
    {
        return $this->belongsTo('App\Country','country_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{

    public $table='password_resets';

    protected $fillable=[
        'email',
        'token',
        'created_at',
    ];

}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'surname',
        'tel',
        'CF',
        'address',
        'num',
        'username',
        'email',
        'password',
        'type',
        'client_id',
        'firstLog'
    ];
    //Table Name
    protected $table = 'users';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}

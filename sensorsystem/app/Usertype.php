<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usertype extends Authenticatable
{
    protected $fillable = [
        'id',
        'type'
    ];
    //Table Name
    protected $table = 'usertype';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}

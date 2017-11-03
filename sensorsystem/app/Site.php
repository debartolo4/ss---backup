<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'name',
        'description',
        'address',
        'num',
        'province',
        'client_id'
    ];
    //Table Name
    protected $table = 'sites';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}

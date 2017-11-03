<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    protected $fillable = [
        'trans_string'
    ];

    //Table Name
    protected $table = 'transmissions';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}

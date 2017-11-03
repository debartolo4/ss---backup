<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransmissionData extends Model
{
    protected $fillable = [
        'id_trans'
    ];

    //Table Name
    protected $table = 'transmission_data';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}

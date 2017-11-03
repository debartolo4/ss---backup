<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorType extends Model
{
    protected $fillable = [
        'type',
        'code'
    ];

    //Table Name
    protected $table = 'sensor_types';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}

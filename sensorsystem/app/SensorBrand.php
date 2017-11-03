<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorBrand extends Model
{
    protected $fillable = [
        'brand',
        'code'
    ];
    //Table Name
    protected $table = 'sensor_brands';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}

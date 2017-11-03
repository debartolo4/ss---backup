<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'id_string',
        'coordinates',
        'minV',
        'maxV',
        'brand_id',
        'type_id',
        'site_id'
    ];

    //Table Name
    protected $table = 'sensors';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}

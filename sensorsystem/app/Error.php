<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $fillable = [
        'error'
    ];

    //Table Name
    protected $table = 'errors';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = false;
}

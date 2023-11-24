<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamousNames extends Model
{
    //
    protected $fillable = [
        'name',
        'lat',
        'lng'
    ];
}

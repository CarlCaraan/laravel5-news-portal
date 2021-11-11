<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //~Protect Data
    protected $fillable = [
        'name'
    ];
}

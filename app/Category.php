<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //~Protect Data
    protected $fillable = [
        'name'
    ];
}

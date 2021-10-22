<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//~Add Soft Delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //~Soft Delete
    use SoftDeletes;


    //~Protect Data
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at'
    ];
}

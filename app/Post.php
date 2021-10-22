<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //~Protect Data
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at'
    ];
}

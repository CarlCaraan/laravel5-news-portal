<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //~Protect Data
    protected $fillable = [
        'name'
    ];

    //~This tag belongs to this post
    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}

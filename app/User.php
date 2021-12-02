<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //~Check if the user is admin
    public function isAdmin() {
        return $this->role == 'admin';
    }
    //~Check if the user is writer
    public function isWriter() {
        return $this->role == 'writer';
    }
    //~Check if the user is viewer
    public function isViewer() {
        return $this->role == 'viewer';
    }

    //~User has a many post
    public function posts() {
        return $this->hasMany(Post::class);
    }
}

<?php

namespace App\Http\Controllers;

//~Add class models
use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //~Add view to users
    public function index() {
        return view('users.index')->with('users', User::all());
    }
}

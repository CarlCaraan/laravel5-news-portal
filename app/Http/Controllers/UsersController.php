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

    // ~Make user admin
    public function makeAdmin(User $user) {
        $user->role = 'admin';
        $user->save();

        //~Show Status Message
        session()->flash('success', 'User made admin successfully.');
        
        //~Refresh the page
        return redirect(route('users.index'));
    }
}

<?php

namespace App\Http\Controllers;

//~Add class models
use App\User;

use Illuminate\Http\Request;

//~Add update profile request
use App\Http\Requests\Users\UpdateProfileRequest;

class UsersController extends Controller
{
    //~Add view to users
    public function index() {
        return view('users.index')->with('users', User::paginate(6));
    }

    //~View Profile Section
    public function edit() {
        return view('users.edit')->with('user', auth()->user());
    }

    // ~Update Profile Section
    public function update(UpdateProfileRequest $request) {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        //~Show Status Message
        session()->flash('success', 'User updated successfully.');

        //~Refresh the page
        return redirect()->back();
    }

    // ~Make user admin
    public function makeAdmin(User $user) {
        $user->role = 'admin';
        $user->save();

        //~Show Status Message
        session()->flash('success', 'Admin role successfully assigned.');
        
        //~Refresh the page
        return redirect(route('users.index'));
    }

    // ~Make user writer
    public function makeWriter(User $user) {
        $user->role = 'writer';
        $user->save();

        //~Show Status Message
        session()->flash('success', 'Writer role successfully assigned.');
        
        //~Refresh the page
        return redirect(route('users.index'));
    }
    // ~Make user viewer
    public function makeViewer(User $user) {
        $user->role = 'viewer';
        $user->save();

        //~Show Status Message
        session()->flash('success', 'Role successfully removed.');
        
        //~Refresh the page
        return redirect(route('users.index'));
    }
}

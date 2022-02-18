<?php

// ~Add class model
use App\User;

use Illuminate\Database\Seeder;

// ~Add to hash password
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ~Set roles to accounts
        $user = User::where('email', 'bannedefused@gmail.com')->first();
        
        // ~if user is not found
        if(!$user) {
            User::create([
                'name' => 'Admin Account',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}

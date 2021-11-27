<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ~Add the seeder here
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}

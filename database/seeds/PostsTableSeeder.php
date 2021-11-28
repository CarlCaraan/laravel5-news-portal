<?php

use App\Post;
use App\Category;
use App\Tag;

use Illuminate\Database\Seeder;

// ~Add to hash password
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ~Add dummy category data here
        $author1 = App\User::create([
            'name' => 'Cindy Carolino',
            'email' => 'cindy@gmail.com',
            'password' => Hash::make('password')
        ]);

        $author2 = App\User::create([
            'name' => 'Tony Carolino',
            'email' => 'tony@doe.com',
            'password' => Hash::make('password')
        ]);

        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);
        $category3 = Category::create([
            'name' => 'Business'
        ]);

        // ~Add dummy post data here
        $post1 = $author1->posts()->create([
            'title' => 'PAALALA BAGO MAGPABAKUNA LABAN SA COVID-19',
            'description' => 'Resbakuna',
            'content' => 'News 1 Content',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);

        // ~Add dummy tag data here
        $tag1 = Tag::create([
            'name' => 'Events'
        ]);
        $tag2 = Tag::create([
            'name' => 'Covid'
        ]);
        $tag3 = Tag::create([
            'name' => 'Seminar'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
    }
}

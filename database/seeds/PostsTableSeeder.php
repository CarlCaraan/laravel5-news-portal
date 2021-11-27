<?php

use App\Post;
use App\Category;
use App\Tag;

use Illuminate\Database\Seeder;

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
        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Marketing'
        ]);
        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        // ~Add dummy post data here
        $post1 = Post::create([
            'title' => 'News 1 Title',
            'description' => 'News 1 Description',
            'content' => 'News 1 Content',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);
        $post2 = Post::create([
            'title' => 'News 2 Title',
            'description' => 'News 2 Description',
            'content' => 'News 2 Content',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);
        $post3 = Post::create([
            'title' => 'News 3 Title',
            'description' => 'News 3 Description',
            'content' => 'News 3 Content',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);

        // ~Add dummy tag data here
        $tag1 = Tag::create([
            'name' => 'job'
        ]);
        $tag2 = Tag::create([
            'name' => 'customers'
        ]);
        $tag3 = Tag::create([
            'name' => 'record'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
    }
}

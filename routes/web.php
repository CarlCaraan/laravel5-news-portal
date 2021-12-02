<?php

use App\Http\Controllers\Blog\PostsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ~Add Welcome Controller Route
Route::get('/', 'WelcomeController@index')->name('welcome');
// ~Add Welcome Controller Route
Route::get('blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');

// Click category filter route
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
// Click tag filter route
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Auth::routes();

//~ Add routes and middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('posts', 'PostsController')->middleware(['auth']);
    Route::resource('tags', 'TagsController');
    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
    Route:: put('restore-post/{post}', 'PostsController@restore')->name('restore-posts');
});

//~Add route to users
Route::middleware(['auth', 'admin'])->group(function () {
    // ~Profile Section
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');

    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});
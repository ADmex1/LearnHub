<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/posts', function () {
    $posts = Post::with(['author', 'category'])->latest();



    return view('posts', [
        'title' => 'Articles',
        'posts' => $posts->get(),
    ]);
});

// Single post by slug (Route model binding)
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'title' => $post->title,
        'post' => $post
    ]);
});

Route::get('/authors/{user:username}', function (User $user) {
    $posts = $user->posts()->with(['author', 'category'])->latest()->get();

    return view('posts', [
        'title' => count($posts) . ' Article(s) by ' . $user->username,
        'posts' => $posts
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    $posts = $category->posts()->with(['author', 'category'])->latest()->get();

    return view('posts', [
        'title' => 'Category: ' . $category->name,
        'posts' => $posts
    ]);
});

Route::get('/kontakt', function () {
    return view('kontakt', ['title' => 'Kontakt']);
});

Route::get('/project', function () {
    return view('project', ['title' => 'Project']);
});

Route::get('/:3', function () {
    return "Helllo :3";
});

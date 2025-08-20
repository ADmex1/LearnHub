<?php

use App\Http\Controllers\PostDashboardController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/', function () {
    $posts = Post::with(['author', 'category'])->latest();
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
    return view('home', ['title' => 'Welcome to Community Hub',  'posts' => $posts,]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/posts', function () {
    $posts = Post::with(['author', 'category'])->latest();
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
    return view('posts', [
        'title' => 'The Community Blogs',
        'posts' => $posts,
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
        'title' => count($posts) . ' blog(s) by ' . $user->username,
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

Route::get('/books', function () {
    return view('books', ['title' => 'Uploaded Books by the Community']);
});

Route::get('/project', function () {
    return view('project', ['title' => 'Project']);
});

Route::get('/:3', function () {
    return "Helllo :3";
});




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/my-blog', [PostDashboardController::class, 'index'])->name('dashboard');
    //Create
    Route::get('/my-blog/create', [PostDashboardController::class, 'create']);
    Route::post('/my-blog', [PostDashboardController::class, 'store']);
    //read single
    Route::get('/my-blog/{post:slug}', [PostDashboardController::class, 'show']);
    //update
    Route::get('/my-blog/{post:slug}/edit', [PostDashboardController::class, 'edit']);
    Route::patch('/my-blog/{post:slug}', [PostDashboardController::class, 'update']);
    //edit
    Route::delete('/my-blog/{post:slug}', [PostDashboardController::class, 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload', [ProfileController::class, 'upload']);
});

require __DIR__ . '/auth.php';

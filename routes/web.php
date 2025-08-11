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
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/posts', function () {
    $posts = Post::with(['author', 'category'])->latest();
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->withQueryString();
    return view('posts', [
        'title' => 'Articles',
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

Route::get('/books', function () {
    return view('books', ['title' => 'books']);
});

Route::get('/project', function () {
    return view('project', ['title' => 'Project']);
});

Route::get('/:3', function () {
    return "Helllo :3";
});


Route::get('/penis', function () {
    return view('articlelist.index');
})->middleware(['auth', 'verified'])->name('profile');

Route::get('/penis/{post:slug}', [PostDashboardController::class, 'show'])->middleware(['auth', 'verified']);

Route::get('/penis', [PostDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

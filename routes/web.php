<?php

use App\Models\Book;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostDashboardController;


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('/', function () {
    $posts = Post::with(['author', 'category'])->latest();
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
    $books = Book::with('author', 'category')->latest();
    $books = Book::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
    return view('home', ['title' => 'Welcome to Community Hub',  'posts' => $posts, 'books' => $books]);
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
    $books = Book::with('author', 'category')->latest();
    $books = Book::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();
    return view('books', ['title' => 'Uploaded Books by the Community',   'books' => $books]);
});

Route::get('/home-book/{book:slug}', function (Book $book) {
    return view(
        //$book->title,
        'book',
        [
            'title' => $book->title,
            'book' => $book
        ]
    );
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/:3', function () {
    return "Helllo :3 you found secret route";
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
    //Delete
    Route::delete('/my-blog/{post:slug}', [PostDashboardController::class, 'destroy']);
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/my-book', [BookController::class, 'index'])->name('books.index');
    //Create
    Route::get('/my-book/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/my-book', [BookController::class, 'store'])->name('books.store');

    // Read 
    Route::get('/my-book/{book:slug}', [BookController::class, 'show'])->name('books.show');
    Route::get('/my-book/preview/{book:slug}', [BookController::class, 'bookpreview'])->name('book.preview');
    // Update
    Route::get('/my-book/{book:slug}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::patch('/my-book/{book:slug}', [BookController::class, 'update'])->name('books.update');

    // Delete
    Route::delete('/my-book/{book:slug}', [BookController::class, 'destroy'])->name('books.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload', [ProfileController::class, 'upload']);
});

require __DIR__ . '/auth.php';

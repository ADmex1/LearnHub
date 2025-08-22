<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /** List user's books */
    public function index(Request $request)
    {
        $books = Book::where('author_id', Auth::id())->with('category')->latest();

        if ($request->has('keyword')) {
            $books->where('title', 'like', '%' . $request->keyword . '%');
        }

        return view('booklist.index', [
            'title' => 'Your Books',
            'books' => $books->paginate(5)
        ]);
    }

    /** Show form to create book */
    public function create()
    {
        $categories = Category::all();
        echo view('booklist.create', [
            'title' => 'Add New Book',
            'categories' => $categories,
        ]);
    }

    /** Store new book */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|integer',
            'file' => 'required|file|mimes:pdf,epub,txt|max:10240'
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('books', $filename, 'public');
        }

        Book::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'author_id' => Auth::id(),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'file_path' => $filePath
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully!');
    }

    /** Show edit form */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('booklist.edit', [
            'title' => 'Edit Book',
            'book' => $book,
            'categories' => $categories
        ]);
    }

    /** Update book */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|integer',
            'file' => 'required|file|mimes:pdf,epub,txt|max:102400'
        ]);

        $data = $request->only(['title', 'description', 'category_id']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('file')) {
            if ($book->file_path && Storage::disk('public')->exists($book->file_path)) {
                Storage::disk('public')->delete($book->file_path);
            }
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('books', $filename, 'public');
            $data['file_path'] = $filePath;
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /** Delete book */
    public function destroy(Book $book)
    {
        if ($book->file_path && Storage::disk('public')->exists($book->file_path)) {
            Storage::disk('public')->delete($book->file_path);
        }

        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
    public function show(Book $book)
    {
        return view('booklist.show', ['title' => $book->title, 'book' => $book]);
    }
}

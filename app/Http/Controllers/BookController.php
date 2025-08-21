<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::where('author_id', Auth::id())
            ->latest();

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
        return view('booklist.create', [
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

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('books', $filename, 'public'); // stored in storage/app/public/books
        } else {
            $filePath = null;
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
            'slug' => Str::slug($request->title),
            'description' => 'required',
            'category_id' => 'required|integer',
            'file' => 'nullable|file|mimes:pdf,epub,txt|max:10240'
        ]);

        $data = $request->all();

        // Handle file upload if new file is provided
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($book->file_path && Storage::disk('public')->exists($book->file_path)) {
                \Storage::disk('public')->delete($book->file_path);
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
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}

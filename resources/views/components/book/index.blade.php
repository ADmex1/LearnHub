<x-layout :title="$title">
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">📚 Your Books</h1>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('books.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-lg">
            + Add Book
        </a>

        @foreach ($books as $book)
            <div class="border p-4 mb-3 rounded-lg shadow">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('books.show', $book->slug) }}">{{ $book->title }}</a>
                </h2>
                <p class="text-gray-600">{{ Str::limit($book->description, 100) }}</p>
                <div class="mt-2 flex space-x-2">
                    <a href="{{ route('books.edit', $book->slug) }}"
                        class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                    <form action="{{ route('books.destroy', $book->slug) }}" method="POST"
                        onsubmit="return confirm('Delete this book?')">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
</x-layout>

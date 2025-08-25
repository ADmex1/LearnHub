<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased" x-data="{ open: false }">
    <div class="flex justify-center px-4 mx-auto max-w-screen-xl">
        <article class="w-full max-w-4xl bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                {{ $book->title }}
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                Uploaded by : <span class="font-medium">{{ $book->author->username }}</span>
                &bull; {{ $book->created_at->diffForHumans() }}
                <span
                    class="{{ $book->category->color }} text-grey-600 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    {{ $book->category->name }}
                </span>
            </p>
            <div class="prose prose-lg text-gray-700 dark:text-gray-300 mb-6">
                {{ $book->description }}
            </div>
            @if ($book->file_path)
                <a href="{{ asset('storage/' . $book->file_path) }}"
                    class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition"
                    download>
                    Download Book
                </a>
                <button @click="open = true"
                    class="ml-2 px-4 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    Book preview
                </button>
            @else
                <span class="text-gray-500 dark:text-gray-400">File not available</span>
            @endif
            <div x-show="open" x-transition.opacity
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
                <div x-show="open" x-transition @click.outside="open = false"
                    class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-11/12 md:w-3/4 h-5/6 p-4 relative">
                    <button @click="open = false"
                        class="absolute top-3 right-3 text-gray-600 hover:text-red-500 text-xl">
                        &times;

                    </button>
                    <embed src="{{ route('book.preview', $book) }}" type="application/pdf"
                        class="w-full h-full rounded" />
                </div>
            </div>
        </article>
    </div>
</main>

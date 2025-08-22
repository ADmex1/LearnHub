<x-layout :title="$title">
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-center px-4 mx-auto max-w-screen-xl">
            <article class="w-full max-w-4xl bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ $book->title }}
                </h1>

                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Uploaded by: <span class="font-medium">{{ $book->author->username }}</span>
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
                @else
                    <span class="text-gray-500 dark:text-gray-400">File not available</span>
                @endif
            </article>
        </div>
    </main>
    {{-- <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-center px-4 mx-auto max-w-screen-xl">
        <article class="w-full max-w-4xl bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                {{ $book->title }}
            </h1>

            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                Uploaded by: <span class="font-medium">{{ $book->author->username }}</span>
                &bull; {{ $book->created_at->diffForHumans() }}
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
            @else
                <span class="text-gray-500 dark:text-gray-400">File not available</span>
            @endif
        </article>
    </div>
</main> --}}
</x-layout>

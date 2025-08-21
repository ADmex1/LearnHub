<x-layout :title="$title">
    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:px-6">
        <form class="mb-8 max-w-md mx-auto">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}" />
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}" />
            @endif

            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search" autofocus autocomplete="off" name="search" />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <div class="grid mt-4 gap-8 lg:grid-cols-3 md:grid-cols-2 s:grid-cols-1">
            @forelse ($books as $book)
                <article
                    class="group p-6 bg-white border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-4">
                        <a href="/books?category={{ $book->category->slug }}">
                            <span
                                class="px-3 py-1 text-xs font-semibold {{ $book->category->color }} bg-opacity-10 text-gray-600 dark:text-gray-300 group-hover:bg-opacity-20 transition">
                                {{ $book->category->name }}
                            </span>
                        </a>
                        <span class="text-xs text-gray-500 dark:text-gray-400">
                            {{ $book->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <h2
                        class="mb-3 text-xl font-bold text-gray-900 dark:text-white group-hover:text-blue-600 transition">
                        <a href="/my-book/{{ $book->slug }}">{{ $book->title }}</a>
                    </h2>

                    <p class="mb-5 text-sm text-gray-600 dark:text-gray-400">
                        {!! Str::limit($book->content, 30) !!}
                    </p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="/books?author={{ $book->author->username }}" class="flex items-center space-x-3">
                            <img class="w-9 h-9 rounded-full object-cover"
                                src="{{ $book->author->avatar ? asset('storage/' . $book->author->avatar) : asset('img/default-avatar.jpg') }}"
                                alt="{{ $book->author->username }}">
                            <span class="text-sm font-medium text-gray-800 dark:text-white">
                                {{ $book->author->name }}
                            </span>
                        </a>
                        <a href="/my-book/{{ $book->slug }}"
                            class="flex items-center text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6
                                6a1 1 0 010 1.414l-6 6a1 1
                                0 01-1.414-1.414L14.586
                                11H3a1 1 0 110-2h11.586l-4.293-4.293a1
                                1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @empty
                <div>
                    <p class="font-semibold text-xl my-4">There are no books uploaded yet...</p>
                </div>
            @endforelse
        </div>
        <div class="mt-8">
            {{ $books->links() }}
        </div>
    </div>
</x-layout>

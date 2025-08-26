<x-layout :title="$title">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h2 class="text-center text-2xl font-bold text-gray-800 dark:text-white mb-8">
            Recent Uploads
        </h2>

        @if ($posts->count() > 0 or $books->count() > 0)
            <div class="flex justify-center">
                <div class="space-y-4 w-full max-w-2xl">
                    @foreach ($posts->take(3) as $recentPost)
                        <article class="border-b border-gray-300 dark:border-gray-700 pb-3">
                            <div class="flex justify-between items-center">
                                <h3 class="text-base font-semibold text-gray-900 dark:text-white">
                                    <a href="/posts/{{ $recentPost->slug }}" class="hover:text-indigo-500">
                                        {{ $recentPost->title }}
                                    </a>
                                </h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $recentPost->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                <span class="font-medium">{{ $recentPost->author->name }}</span> Just uploaded a Blog
                            </p>
                            <p class="mb-5 text-sm text-gray-600 dark:text-gray-400">
                                {!! Str::limit($recentPost['content'], 30) !!}
                            </p>
                            <a href="/posts/{{ $recentPost['slug'] }}"
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
                        </article>
                    @endforeach
                    @foreach ($books->take(2) as $recentBook)
                        <article class="border-b border-gray-300 dark:border-gray-700 pb-3">
                            <div class="flex justify-between items-center">
                                <h3 class="text-base font-semibold text-gray-900 dark:text-white">
                                    <a href="/my-book/preview/{{ $recentBook->slug }}" class="hover:text-indigo-500">
                                        {{ $recentBook->title }}
                                    </a>
                                </h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $recentBook->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                <span class="font-medium">{{ $recentBook->author->name }}</span> just uploaded a Book
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
            {{-- <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-6xl">
                    @foreach ($posts->take(3) as $recentPost)
                        <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-lg transition p-5">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    <a href="/posts/{{ $recentPost->slug }}" class="hover:text-indigo-500">
                                        {{ $recentPost->title }}
                                    </a>
                                </h3>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $recentPost->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <span class="font-medium">{{ $recentPost->author->name }}</span> just uploaded a
                                blog
                            </p>

                            <p class="mt-3 text-sm text-gray-600 dark:text-gray-400 line-clamp-3">
                                {!! Str::limit($recentPost['content'], 50) !!}
                            </p>

                            <a href="/posts/{{ $recentPost['slug'] }}"
                                class="mt-4 inline-flex items-center text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                Read more
                                <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6
                                6a1 1 0 010 1.414l-6 6a1 1
                                0 01-1.414-1.414L14.586
                                11H3a1 1 0 110-2h11.586l-4.293-4.293a1
                                1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div> --}}
        @else
            <p class="text-center text-gray-500">No posts available.</p>
        @endif
    </div>
</x-layout>

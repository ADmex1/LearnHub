<x-layout :title=$title>
    {{-- <article class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="/authors/{{ $post->author->username }}" class="hover:underline">{{ $post->author->username }} </a> |
            {{ $post->created_at }}
            <p class="my-4 font-light">{{ $post['content'] }}
            </p>
            <a href="/posts" class="font-medium text-blue-600">&laquo; Back</a>
        </div>
    </article> --}}

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">

            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <a href="/posts" class="font-medium text-xs text-blue-500 hover:underline">&laquo; Return to Article
                    page</a>
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="{{ $post->author->name }} ">
                            <div>
                                <a href="/author/{{ $post->author->username }} " rel="{{ $post->author->name }} "
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}
                                </a>
                                <a href="{{ $post->category->slug }}" class="block">
                                    <span
                                        class="{{ $post->category->color }} text-grey-600 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->diffforHumans() }}</time></p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post['title'] }}</h1>
                </header>

                <p>{{ $post['content'] }}</p>
            </article>
        </div>
    </main>
</x-layout>

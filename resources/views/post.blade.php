<x-layout :title=$title>
    {{-- <blog class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="/authors/{{ $post->author->username }}" class="hover:underline">{{ $post->author->username }} </a> |
            {{ $post->created_at }}
            <p class="my-4 font-light">{{ $post['content'] }}
            </p>
            <a href="/posts" class="font-medium text-blue-600">&laquo; Back</a>
        </div>
    </blog> --}}
    @push('style')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" rel="stylesheet">
        <style>
            .ql-ui {
                display: none !important;
            }

            pre {
                position: relative;
                border-radius: 0.5rem;
                padding: 1rem;
                overflow-x: auto;
            }

            pre code {
                font-size: 0.875rem;
                display: block;
            }

            .lang-tag {
                position: absolute;
                top: 8px;
                right: 60px;
                background: #2563eb;
                color: #fff;
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
                border-radius: 4px;
                text-transform: uppercase;
            }

            .copy-btn {
                position: absolute;
                top: 8px;
                right: 8px;
                background: #374151;
                color: #fff;
                border: none;
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>
    @endpush
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">

            <blog
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <a href="/posts" class="font-medium text-xs text-blue-500 hover:underline">&laquo; Return to blog
                    page</a>
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : asset('img/default-avatar.jpg') }}"
                                alt="{{ $post->author->username }} ">
                            <div>
                                <a href="/posts?author={{ $post->author->username }} " rel="author "
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}
                                </a>
                                <a href="/posts?category={{ $post->category->slug }}" class="block">
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

                <div>{!! $post['content'] !!}</div>
            </blog>
        </div>
    </main>

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                // Convert Quill code blocks into <pre><code>
                document.querySelectorAll(".post-content .ql-code-block").forEach((el) => {
                    let lang = el.getAttribute("data-language") || "plaintext";
                    let code = document.createElement("code");
                    code.className = "language-" + lang;
                    code.textContent = el.innerText;

                    let pre = document.createElement("pre");
                    pre.appendChild(code);

                    // add language tag
                    let tag = document.createElement("span");
                    tag.className = "lang-tag";
                    tag.textContent = lang;

                    // add copy button
                    let btn = document.createElement("button");
                    btn.className = "copy-btn";
                    btn.textContent = "Copy";
                    btn.onclick = () => {
                        navigator.clipboard.writeText(el.innerText);
                        btn.textContent = "Copied!";
                        setTimeout(() => btn.textContent = "Copy", 1500);
                    };

                    pre.appendChild(tag);
                    pre.appendChild(btn);

                    el.replaceWith(pre);
                });

                // Apply highlight.js
                document.querySelectorAll("pre code").forEach((block) => {
                    hljs.highlightElement(block);
                });
            });
        </script>
    @endpush

</x-layout>

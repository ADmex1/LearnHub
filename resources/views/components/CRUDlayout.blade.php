<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-bind:class="{ 'dark': darkMode }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel User') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Alpine + Flowbite -->
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Extra CSS for pages --}}
    @stack('style')
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 font-sans antialiased">

    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-4">
            <a href="/" class="text-xl font-bold text-primary-600 dark:text-primary-400">
                {{ config('app.name', 'Laravel User') }}
            </a>

            {{-- <div class="flex items-center gap-4">
                <a href="/my-blog" class="hover:text-primary-600 dark:hover:text-primary-400">My Blog</a>
                <a href="/profile" class="hover:text-primary-600 dark:hover:text-primary-400">Profile</a>
                <button @click="darkMode = !darkMode"
                    class="p-2 rounded-lg border dark:border-gray-600 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    <span x-show="!darkMode">🌙</span>
                    <span x-show="darkMode">☀️</span>
                </button>
            </div> --}}
        </div>
    </nav>

    <!-- Page Header -->
    @isset($header)
        <header class="bg-gray-50 dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center text-sm text-gray-500 dark:text-gray-400">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </footer>

    {{-- Extra JS for pages --}}
    @stack('script')
</body>

</html>

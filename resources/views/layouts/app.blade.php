<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-bind:class="{ 'dark': darkMode }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Page-specific CSS --}}
    @stack('style')
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">

    <!-- Navbar -->
    <div class="sticky top-0 z-50 shadow bg-white dark:bg-gray-800">
        @include('layouts.navigation')
    </div>

    <!-- Header (optional) -->
    @isset($header)
        <header class="border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Main content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex items-center justify-between">
            <p class="text-sm text-gray-500 dark:text-gray-400">&copy; {{ date('Y') }} {{ config('app.name') }}. All
                rights reserved.</p>

            {{-- <!-- Dark mode toggle -->
            <button @click="darkMode = !darkMode"
                class="px-3 py-1 rounded-lg border dark:border-gray-600 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                <span x-show="!darkMode"> Dark</span>
                <span x-show="darkMode"> Light</span>
            </button> --}}
        </div>
    </footer>

    {{-- Page-specific JS --}}
    @stack('script')
</body>

</html>

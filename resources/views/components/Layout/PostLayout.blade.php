<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'LearnHub Beta' }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('style')
</head>

<body class="h-full font-inter text-gray-900 bg-gray-100">
    <div class="min-h-full flex flex-col">

        <!-- Navbar -->
        <x-navbar />

        <!-- Main content area (full screen height) -->
        <main class="flex-1 flex items-start justify-center px-4 py-8 min-h-screen">
            <div class="w-full max-w-5xl">
                <!-- Blog content slot -->
                {{ $slot }}

                <!-- Optional: Blog comments section -->
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-200 text-gray-700 py-6 mt-auto">
            <div class="container mx-auto text-center text-sm">
                &copy; {{ date('Y') }} LearnHub Beta. All rights reserved.
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @stack('script')
</body>

</html>

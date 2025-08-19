<x-Layout.AboutLayout>
    <!-- Tailwind Animation -->
    @push('style')
        <style>
            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    transform: translateY(40px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fadeIn {
                animation: fadeIn 1s forwards;
            }

            .delay-150 {
                animation-delay: 0.15s;
            }

            .delay-300 {
                animation-delay: 0.3s;
            }
        </style>
    @endpush

    <main class="h-screen overflow-y-scroll snap-y snap-mandatory scroll-smooth">
        {{-- About --}}
        <section
            class="h-screen snap-start bg-white flex flex-col justify-center px-6 sm:px-12 lg:px-24 opacity-0 animate-fadeIn">
            <h2 class="text-4xl font-bold mb-6">About the Website</h2>
            <p class="text-lg text-gray-700 max-w-3xl">
                {{ config('app.name', 'MySite') }} is a platform for sharing knowledge, books, and discussions with
                each other. Users can also share ongoing projects or showcase the results of projects they have made.
            </p>
        </section>
        <!-- The Developer Info -->
        <section
            class="h-screen snap-start bg-gray-50 flex flex-col lg:flex-row-reverse items-center justify-center gap-12 px-6 sm:px-12 lg:px-24 opacity-0 animate-fadeIn delay-150">
            <a href="https://github.com/ADmex1" target="_blank" rel="noopener noreferrer">
                <img src="https://avatars.githubusercontent.com/u/157784316?v=4" alt="Rajendra Pradiptayudha GitHub"
                    class="w-40 h-40 full border border-gray-300 hover:ring-2 hover:ring-blue-500 transition">
            </a>
            <div class="max-w-3xl">
                <h2 class="text-4xl font-bold mb-4">The Developer</h2>
                <p class="text-lg text-gray-700">
                    This website was developed by ADMex1. Passionate about web development and cybersecurity.
                </p>
            </div>
        </section>
        {{-- Dev Stacks --}}
        <section
            class="h-screen snap-start bg-white flex flex-col justify-center items-center px-6 sm:px-12 lg:px-24 gap-8 opacity-0 animate-fadeIn delay-300">
            <h2 class="text-4xl font-bold mb-8">The Stack</h2>
            <div class="flex flex-wrap justify-center items-center gap-8">
                <a href="https://laravel.com/" target="_blank" rel="noopener noreferrer">
                    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
                        class="w-32 h-32 border border-gray-300 hover:ring-2 hover:ring-blue-500 transition">
                </a>
                <a href="https://alpinejs.dev/" target="_blank" rel="noopener noreferrer">
                    <img src="https://alpinejs.dev/alpine_long.svg"
                        class="w-32 h-32 border border-gray-300 hover:ring-2 hover:ring-blue-500 transition">
                </a>
                <a href="https://vite.dev/" target="_blank" rel="noopener noreferrer">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/f1/Vitejs-logo.svg"
                        class="w-32 h-32 border border-gray-300 hover:ring-2 hover:ring-blue-500 transition">
                </a>
                <a href="https://quilljs.com/" target="_blank" rel="noopener noreferrer">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTHZdxEnzz4xVrJMPrdN8djj8nC4cDewxApQ&s"
                        class="w-32 h-32 border border-gray-300 hover:ring-2 hover:ring-blue-500 transition">
                </a>
            </div>
            <p class="text-lg text-gray-700 max-w-3xl mt-6 text-center">
                The website is built with Laravel and Blade for the backend, Tailwind CSS for styling, Alpine.js for
                interactivity, and Vite, Quill for frontend tooling.
            </p>
        </section>
    </main>
</x-Layout.AboutLayout>

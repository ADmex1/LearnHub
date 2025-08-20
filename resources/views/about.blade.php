<x-Layout.AboutLayout>
    @push('style')
        <style>
            /* Smooth fade + slide transition for all sections */
            section {
                opacity: 0;
                transform: translateY(40px);
                transition: opacity 0.6s ease-out, transform 0.6s ease-out;
                will-change: opacity, transform;
                backface-visibility: hidden;
            }

            section.visible {
                opacity: 1;
                transform: translateY(0);
            }

            /* Cards */
            .stack-card {
                transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
                transform-origin: center;
            }

            .stack-card:hover {
                transform: translateY(-10px) scale(1.02);
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            }

            /* Profile image */
            .profile-image {
                transition: transform 0.3s ease-out;
                will-change: transform;
            }

            .profile-image:hover {
                transform: scale(1.05);
            }

            /* Overlay for background image */
            .bg-overlay {
                background: linear-gradient(135deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.4) 100%);
            }

            /* Fix for potential layout shifts */
            .stack-card img {
                transition: none;
            }
        </style>
    @endpush

    <main class="h-screen overflow-y-scroll  scroll-smooth">
        {{-- Hero / About Section --}}
        <section class="h-screen snap-start bg-cover bg-center bg-no-repeat relative"
            style="background-image: url('https://st5.depositphotos.com/54483894/63252/i/450/depositphotos_632529170-stock-photo-software-developer-doing-php-coding.jpg');">
            <div class="flex flex-col justify-center items-center h-full bg-overlay px-6 sm:px-12 lg:px-24">
                <div class="text-center max-w-4xl">
                    <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                        About <span>{{ config('app.name', 'MySite') }}</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-200 mb-8 leading-relaxed">
                        A Website where fellow learners can share knowledge, books, discussions, and their projects.
                    </p>
                </div>
            </div>
        </section>

        {{-- Developer Section --}}
        <section
            class="h-screen snap-start bg-gradient-to-br from-gray-50 to-gray-100 flex flex-col lg:flex-row-reverse items-center justify-center gap-12 px-6 sm:px-12 lg:px-24">
            <div class="relative max-w-xs">
                <a href="https://github.com/ADmex1" target="_blank" rel="noopener noreferrer">
                    <img src="https://avatars.githubusercontent.com/u/157784316?v=4" alt="Rajendra Pradiptayudha GitHub"
                        class="profile-image w-48 h-48  ">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 hover:opacity-30 transition-opacity duration-300  pointer-events-none">
                    </div>
                </a>
            </div>

            <div class="max-w-3xl">
                <h2 class="text-5xl font-bold mb-6">The Developer</h2>
                <p class="text-xl text-gray-700 leading-relaxed"><strong>ADMex1</strong></p>
                <p class="text-lg text-gray-900 leading-relaxed">
                    Passionate about <strong>web development</strong> and <strong>cybersecurity</strong>.
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <span class="bg-blue-900 text-blue-100 px-4 py-2 rounded-full text-sm font-medium">Web
                        Development</span>
                    <span
                        class="bg-gray-900 text-gray-50 px-4 py-2 rounded-full text-sm font-medium">Cybersecurity</span>
                </div>

                <div class="mt-8">
                    <a href="https://github.com/ADmex1" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center px-6 py-3 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors duration-200 font-medium">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        View on GitHub
                    </a>
                </div>
            </div>
        </section>

        {{-- Technology Stack Section --}}
        <section
            class="h-screen snap-start bg-gradient-to-br from-white to-gray-50 flex flex-col justify-center items-center px-6 sm:px-12 lg:px-24 gap-12">
            <h2 class="text-5xl font-bold mb-4 text-center">Technology Stack</h2>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl w-full">
                <!-- Laravel -->
                <div
                    class="stack-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 flex flex-col items-center text-center">
                    <a href="https://laravel.com/" target="_blank" rel="noopener noreferrer">
                        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
                            class="w-24 h-24 mb-4 mx-auto" alt="Laravel">
                        <h3 class="font-bold text-gray-800 mb-2">Laravel</h3>
                        <p class="text-sm text-gray-600">Elegant PHP Framework</p>
                    </a>
                </div>

                <!-- Alpine.js -->
                <div
                    class="stack-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 flex flex-col items-center text-center">
                    <a href="https://alpinejs.dev/" target="_blank" rel="noopener noreferrer">
                        <img src="https://alpinejs.dev/alpine_long.svg" class="w-24 h-24 mb-4 mx-auto" alt="Alpine.js">
                        <h3 class="font-bold text-gray-800 mb-2">Alpine.js</h3>
                        <p class="text-sm text-gray-600">Minimal JavaScript Framework</p>
                    </a>
                </div>

                <!-- Vite -->
                <div
                    class="stack-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 flex flex-col items-center text-center">
                    <a href="https://vitejs.dev/" target="_blank" rel="noopener noreferrer">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f1/Vitejs-logo.svg"
                            class="w-24 h-24 mb-4 mx-auto" alt="Vite">
                        <h3 class="font-bold text-gray-800 mb-2">Vite</h3>
                        <p class="text-sm text-gray-600">Lightning Fast Build Tool</p>
                    </a>
                </div>

                <!-- Quill.js -->
                <div
                    class="stack-card bg-white rounded-2xl p-8 shadow-lg border border-gray-100 flex flex-col items-center text-center">
                    <a href="https://quilljs.com/" target="_blank" rel="noopener noreferrer">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTHZdxEnzz4xVrJMPrdN8djj8nC4cDewxApQ&s"
                            class="w-24 h-24 mb-4 mx-auto" alt="Quill.js">
                        <h3 class="font-bold text-gray-800 mb-2">Quill.js</h3>
                        <p class="text-sm text-gray-600">Rich Text Editor</p>
                    </a>
                </div>
            </div>
        </section>
    </main>

    @push('script')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const sections = document.querySelectorAll("section");

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("visible");
                            observer.unobserve(entry.target); // stop observing
                        }
                    });
                }, {
                    threshold: 0.2
                });


                sections.forEach(section => observer.observe(section));
            });
        </script>
    @endpush
</x-Layout.AboutLayout>

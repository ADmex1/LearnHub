<x-Layout.AboutLayout>
    <main class="flex-1 bg-gray-50">

        <!-- The Goal Section -->
        <section class="bg-white py-16 px-6 sm:px-12 lg:px-24">
            <h2 class="text-3xl font-bold mb-4">About the Website</h2>
            <p class="text-lg text-gray-700 max-w-3xl">
                CommunityHubs is a platform for sharing Knowledge, books and even discussion with each other. User can
                also share their ongoing or showing the result of the project they made.
            </p>
        </section>

        <!-- The Developer Section -->
        <section class="bg-gray-50 py-16 px-6 sm:px-12 lg:px-24">
            <div class="flex flex-col lg:flex-row-reverse items-center lg:items-start gap-6">
                <h2 class="text-3xl font-bold mb-4">The Developer</h2>
                <a href="https://github.com/ADmex1" target="_blank" rel="noopener noreferrer">
                    <img src="https://avatars.githubusercontent.com/u/157784316?v=4" alt="Rajendra Pradiptayudha GitHub"
                        class="w-32 h-32 full border border-gray-300 hover:ring-2 hover:ring-blue-500 transition">
                </a>
                <p class="text-lg text-gray-700 max-w-3xl">
                    This website was developed by ADMex1. Passionate about web development and Cybersecurity.

                </p>
            </div>
        </section>

        <!-- The Stack Section -->
        <section class="bg-white py-16 px-6 sm:px-12 lg:px-24">
            <h2 class="text-3xl font-bold mb-4">The Stack</h2>
            <p class="text-lg text-gray-700 max-w-3xl">
                {{-- The website is built with Laravel and Blade for the backend, Tailwind CSS for styling, Alpine.js for
                interactivity, and a MySQL database. It also uses Flowbite components and Highlight.js for code
                snippets. --}}
            </p>
        </section>

    </main>
</x-Layout.AboutLayout>

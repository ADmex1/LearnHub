<nav class="bg-gray-900 text-white px-8 py-4 flex items-center justify-between shadow-md" x-data="{ mobileOpen: false, profileOpen: false }">
    <a href="/" class="text-2xl font-bold tracking-wide">
        {{ config('app.name', 'MySite') }}
    </a>
    <div class="hidden md:flex space-x-6">
        <x-my-nav-link href="/" :current="request()->is('/')" class="text-white hover:text-cyan-400">Home</x-my-nav-link>
        <x-my-nav-link href="/posts" :current="request()->is('posts')" class="text-white hover:text-cyan-400">Community
            Blogs</x-my-nav-link>
        <x-my-nav-link href="/books" :current="request()->is('books')" class="text-white hover:text-cyan-400">Books</x-my-nav-link>
        {{-- <x-my-nav-link href="/project" :current="request()->is('project')" class="text-white hover:text-cyan-400">Projects</x-my-nav-link> --}}
        <x-my-nav-link href="/about" :current="request()->is('about')" class="text-white hover:text-cyan-400">About</x-my-nav-link>
    </div>
    <div class="hidden md:flex items-center space-x-4">
        @auth
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 text-white hover:text-cyan-400">
                    <img class="size-8 rounded-full"
                        src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/default-avatar.jpg') }}"
                        alt="{{ Auth::user()->avatar }} " />
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white text-gray-800 rounded-md shadow-lg z-50">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                    <a href="/my-blog" class="block px-4 py-2 hover:bg-gray-100">Your Posts</a>
                    <a href="/my-book" class="block px-4 py-2 hover:bg-gray-100">Your Books</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}" class="text-white hover:text-cyan-400">Login</a>
            <div>|</div>
            <a href="{{ route('register') }}" class="text-white hover:text-cyan-400">Register</a>
        @endauth
    </div>
    <!-- Mobile Hamburger Button -->
    <button class="md:hidden text-white focus:outline-none" @click="mobileOpen = !mobileOpen">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>


    <!-- Mobile Dropdown -->
    <div class="md:hidden" x-show="mobileOpen" x-transition.opacity>
        <div class="px-4 pt-4 pb-6 space-y-2 bg-gray-900 rounded-lg shadow-lg overflow-y-auto max-h-[80vh]">

            <!-- Navigation Links -->
            <x-my-nav-link href="/" :current="request()->is('/')"
                class="block text-gray-200 hover:text-cyan-400 font-medium">Home</x-my-nav-link>
            <x-my-nav-link href="/posts" :current="request()->is('posts')"
                class="block text-gray-200 hover:text-cyan-400 font-medium">Community Blogs</x-my-nav-link>
            <x-my-nav-link href="/books" :current="request()->is('books')"
                class="block text-gray-200 hover:text-cyan-400 font-medium">Books</x-my-nav-link>
            <x-my-nav-link href="/about" :current="request()->is('about')"
                class="block text-gray-200 hover:text-cyan-400 font-medium">About</x-my-nav-link>

            <hr class="border-gray-700">

            <!-- Mobile Auth Dropdown -->
            @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="w-full flex items-center space-x-3 px-3 py-2 rounded-md bg-gray-800 hover:bg-gray-700 text-gray-200">
                        <img class="w-8 h-8 rounded-full border border-gray-600"
                            src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/default-avatar.jpg') }}"
                            alt="{{ Auth::user()->name }}">
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 ml-auto transform transition-transform"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition
                        class="mt-2 w-full bg-white rounded-md shadow-md text-gray-800 max-h-[50vh] overflow-y-auto">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                        <a href="/my-blog" class="block px-4 py-2 hover:bg-gray-100">Your Posts</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex flex-col space-y-2">
                    <a href="{{ route('login') }}"
                        class="block text-center px-4 py-2 rounded-md bg-blue-900 text-white hover:bg-blue-700">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="block text-center px-4 py-2 rounded-md bg-gray-700 text-white hover:bg-gray-600">
                        Register
                    </a>
                </div>
            @endauth

        </div>
    </div>

</nav>

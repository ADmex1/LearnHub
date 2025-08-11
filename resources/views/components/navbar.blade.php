<nav class="bg-gray-800" x-data="{ mobileOpen: false, profileOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Left: Logo + Desktop Nav -->
            <div class="flex items-center">
                <div class="shrink-0">
                    <img class="size-8"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/State_arms_of_the_German_Democratic_Republic.svg/640px-State_arms_of_the_German_Democratic_Republic.svg.png"
                        alt="Your Company" />
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-my-nav-link href="/" :current="request()->is('/')">Home</x-my-nav-link>
                        <x-my-nav-link href="/posts" :current="request()->is('posts')">Articles</x-my-nav-link>
                        <x-my-nav-link href="/books" :current="request()->is('books')">Books</x-my-nav-link>
                        <x-my-nav-link href="/project" :current="request()->is('project')">Projects</x-my-nav-link>
                        <x-my-nav-link href="/about" :current="request()->is('about')">About</x-my-nav-link>
                    </div>
                </div>
            </div>

            <!-- Right: Desktop User Menu -->
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Notifications -->
                    <button type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0
                                6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0
                                0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        @if (Auth::check())
                            <button type="button" @click="profileOpen = !profileOpen"
                                class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5 cursor-pointer"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="size-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="" />
                                <div class="text-gray-300 text-sm font-medium ml-3">
                                    {{ Auth::user()->username }}
                                </div>
                                <div class="ms-1 text-gray-300">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="profileOpen" @click.away="profileOpen = false"
                                x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg">
                                <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your
                                    Profile</a>
                                <a href="/penis" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your
                                    Articles</a>
                                <a href="/dashboard"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit"
                                        class="cursor-pointer w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Log out
                                    </button>
                                </form>
                            </div>
                        @else
                            <a href="/login" class="text-white text-sm font-medium">Login</a>
                            <span class="text-white text-sm">|</span>
                            <a href="/register" class="text-white text-sm font-medium">Register</a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" @click="mobileOpen = !mobileOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                    aria-controls="mobile-menu" :aria-expanded="mobileOpen">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Hamburger icon -->
                    <svg :class="{ 'hidden': mobileOpen, 'block': !mobileOpen }" class="size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Close icon -->
                    <svg :class="{ 'block': mobileOpen, 'hidden': !mobileOpen }" class="size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-100 transform"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <x-nav-link href="/" :current="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/posts" :current="request()->is('posts')">Articles</x-nav-link>
            <x-nav-link href="/kontakt" :current="request()->is('kontakt')">Kontakt</x-nav-link>
            <x-nav-link href="/project" :current="request()->is('project')">Projects</x-nav-link>
            <x-nav-link href="/about" :current="request()->is('about')">About</x-nav-link>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-3">
            @if (Auth::check())
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img class="size-10 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" />
                    </div>
                    <div class="text-gray-300 text-sm font-medium ml-3">
                        {{ Auth::user()->username }}
                    </div>
                </div>
                <div class="mt-3 space-y-1 px-2">
                    <a href="/profile"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                        Profile</a>
                    <a href="/penis"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                        Articles</a>
                    <a href="/dashboard"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit"
                            class="w-full text-start block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="my-3 space-y-1 px-2">
                    <a href="/login" class="block text-white text-sm font-medium">Login</a>
                    <a href="/register" class="block text-white text-sm font-medium">Register</a>
                </div>
            @endif
        </div>
    </div>
</nav>

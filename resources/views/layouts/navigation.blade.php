<nav class="bg-white border-b border-gray-300 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo and Text -->
            <div class="flex items-center space-x-6 lg:space-x-12">
                <div class="flex items-center space-x-4">
                    <a href="/" class="flex items-center space-x-2">
                        <img class="h-16 w-auto" src="{{ asset('/storage/images/logo.png') }}" alt="Logo" />
                        <span class="text-4xl    text-gray-900">VELVET</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation Links -->
                <div class="hidden lg:flex lg:items-center lg:space-x-8">
                    <a href="{{ route('products.index') }}" class="relative text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out group">
                        Parfums
                        <span class="absolute left-0 bottom-[-2px] w-full h-0.5 bg-gray-900 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>
                    <a href="{{ route('products.indexM') }}" class="relative text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out group">
                        Men
                        <span class="absolute left-0 bottom-[-2px] w-full h-0.5 bg-gray-900 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>
                    <a href="{{ route('products.indexW') }}" class="relative text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out group">
                        Women
                        <span class="absolute left-0 bottom-[-2px] w-full h-0.5 bg-gray-900 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>
                    <a href="{{ route('products.index') }}" class="relative text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out group">
                        Kids
                        <span class="absolute left-0 bottom-[-2px] w-full h-0.5 bg-gray-900 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>
                    @if(auth()->check())
                        <a href="{{ route('dashboard') }}" class="relative text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out group">
                            Historique
                            <span class="absolute left-0 bottom-[-2px] w-full h-0.5 bg-gray-900 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Settings and User Options -->
            <div class="hidden lg:flex lg:items-center lg:space-x-1">
                <navbar-cart></navbar-cart>
                @if(isset(auth()->user()->name))
                <h1>{{ auth()->user()->name }}</h1>
                @endif
                @if(auth()->check())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <i class="fa-regular fa-user text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out"></i>
                    <a class="p-2 text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out" href="/register">Register</a>
                @endif
            </div>

            <!-- Hamburger Menu for Mobile -->
            <div class="-mr-2 flex items-center lg:hidden">
                <button id="hamburger-button" class="inline-flex items-center justify-center p-2 rounded-full text-gray-400 hover:text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path id="hamburger-icon" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden fixed inset-0 bg-white border-t border-gray-200 shadow-lg transform translate-y-full transition-transform duration-300 ease-in-out">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out {{ request()->routeIs('dashboard') ? 'font-semibold' : '' }}">
                Historique
            </a>
            <a href="{{ route('products.index') }}" class="block px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out {{ request()->routeIs('products.index') ? 'font-semibold' : '' }}">
                Liste des Produits
            </a>
            <a href="{{ route('products.indexM') }}" class="block px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out {{ request()->routeIs('products.indexM') ? 'font-semibold' : '' }}">
                Men
            </a>
            <a href="{{ route('products.indexW') }}" class="block px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out {{ request()->routeIs('products.indexW') ? 'font-semibold' : '' }}">
                Women
            </a>
            <a href="{{ route('products.index') }}" class="block px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out {{ request()->routeIs('products.index') ? 'font-semibold' : '' }}">
                Kids
            </a>
        </div>
        <div class="pt-4 pb-1 border-t border-gray-200 px-4">
            @if(auth()->check())
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:text-gray-900 transition duration-300 ease-in-out">
                        Log Out
                    </button>
                </form>
            @else
                <a href="/register" class="block px-4 py-2 text-gray-600 hover:text-gray-900 transition duration-300 ease-in-out">
                    Register
                </a>
            @endif
        </div>
    </div>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hamburgerButton = document.getElementById('hamburger-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');
        
        hamburgerButton.addEventListener('click', function () {
            if (mobileMenu.classList.contains('translate-y-full')) {
                mobileMenu.classList.remove('translate-y-full');
                mobileMenu.classList.add('translate-y-0');
                hamburgerIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('translate-y-full');
                mobileMenu.classList.remove('translate-y-0');
                hamburgerIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        });
    });
</script>

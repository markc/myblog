<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen">
        <!-- Top navbar -->
        <header class="w-full bg-white dark:bg-[#161615] border-b border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center transition duration-300 ease-in-out">
                    <a href="/"
                     class=" text-xl inline-block px-5 py-1.5 bg-black hover:bg-amber-400 dark:bg-black dark:hover:bg-amber-400 text-amber-500 dark:text-amber-400 hover:dark:text-black font-bold border border-amber-500 dark:border-amber-400 rounded-sm text-sm leading-normal"
                 >
                     MyBlog
                 </a>

                    <!-- Navigation links -->
                    <div class="hidden md:flex items-end space-x-4">
                        <a href="/blogs"
                            class="inline-block px-5 py-1.5 bg-amber-400 hover:bg-black dark:bg-amber-400 dark:hover:black text-black hover:text-amber-400 font-bold border border-black dark:border-amber-400 hover:dark:border-amber-400 rounded-sm text-sm leading-normal"
                            >
                            Blog
                        </a>
                        <a href="#about"
                            class="inline-block px-5 py-1.5 bg-amber-400 hover:bg-black dark:bg-amber-400 dark:hover:black text-black hover:text-amber-400 font-bold border border-black dark:border-amber-400 hover:dark:border-amber-400 rounded-sm text-sm leading-normal"
                            >
                            About
                        </a>
                        <a href="{{ url('/admin/login') }}"
                            class="inline-block px-5 py-1.5 bg-amber-400 hover:bg-black dark:bg-amber-400 dark:hover:black text-black hover:text-amber-400 font-bold border border-black dark:border-amber-400 hover:dark:border-amber-400 rounded-sm text-sm leading-normal"
                        >
                            Sign in
                        </a>
                        <a href="{{ url('/admin/register') }}"
                            class="inline-block px-5 py-1.5 bg-black hover:bg-amber-400 dark:bg-black dark:hover:bg-amber-400 text-amber-500 dark:text-amber-400 hover:dark:text-black font-bold border border-amber-500 dark:border-amber-400 rounded-sm text-sm leading-normal"
                        >
                            Sign up
                        </a>
                    </div>
                    
                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button type="button" class="mobile-menu-button p-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>
            
            <!-- Mobile menu (hidden by default) -->
            <div class="mobile-menu hidden md:hidden border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="/" class="block px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-amber-600 dark:hover:text-amber-400">Home</a>
                    <a href="/blogs" class="block px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-amber-600 dark:hover:text-amber-400">Blog</a>
                    <a href="#about" class="block px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-amber-600 dark:hover:text-amber-400">About</a>
                    <a href="{{ url('/admin/login') }}" class="block px-3 py-2 text-sm font-medium text-amber-600 dark:text-amber-400">Sign in</a>
                    <a href="{{ url('/admin/register') }}" class="block px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-amber-600 dark:hover:text-amber-400 border-t border-[#e3e3e0] dark:border-[#3E3E3A] mt-2 pt-2">Sign up</a>
                </div>
            </div>
        </header>
        
        <script>
            // Mobile menu toggle
            document.addEventListener('DOMContentLoaded', function() {
                const btn = document.querySelector('.mobile-menu-button');
                const menu = document.querySelector('.mobile-menu');
                
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            });
        </script>
        
        <!-- Main content -->
        <main class="flex-grow p-6 lg:p-8">
            <div class="max-w-7xl mx-auto flex flex-col gap-16 py-8 px-4 sm:px-6 lg:px-8">
                <!-- First row: 4 cards across -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-amber-500 dark:text-amber-400 mb-2">Card 1</h2>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-amber-500 dark:text-amber-400 mb-2">Card 2</h2>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-amber-500 dark:text-amber-400 mb-2">Card 3</h2>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-amber-500 dark:text-amber-400 mb-2">Card 4</h2>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                </div>
                
                <!-- Second row: 3 cards across -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-amber-500 dark:text-amber-400 mb-2">Card 5</h2>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-amber-500 dark:text-amber-400 mb-2">Card 6</h2>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-amber-500 dark:text-amber-400 mb-2">Card 7</h2>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                </div>
                
                <!-- Third row: 2 cards across -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-amber-500 dark:text-amber-400 mb-2">Card 8</h2>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-amber-500 dark:text-amber-400 mb-2">Card 9</h2>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                </div>
                
                <!-- Fourth row: 1 card full width at double height -->
                <div id="about" class="bg-white dark:bg-[#161615] shadow-lg rounded-lg overflow-hidden">
                    <div class="p-8 text-center min-h-[300px] flex flex-col justify-center">
                        <h1 class="text-3xl font-bold text-amber-500 dark:text-amber-400 mb-4">About Us</h1>
                        <p class="text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                            We're working on something awesome. Check back soon for more updates about our blog and services.
                            This space will contain more information about our team and mission once our website is fully launched.
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Global Footer -->
        @include('filament.layouts.app-footer')

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
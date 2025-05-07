<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ __('filament::layout.direction') ?? 'ltr' }}"
    class="antialiased filament js-focus-visible"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ filament()->getCurrentTenant()?->name ?? config('app.name') }}</title>

        {{ \Filament\Support\Facades\FilamentView::renderHook('head.start') }}

        <style>
            [x-cloak=""], [x-cloak="x-cloak"], [x-cloak="1"] { display: none \!important; }
            @media (max-width: 1023px) { [x-cloak="-lg"] { display: none \!important; } }
            @media (min-width: 1024px) { [x-cloak="lg"] { display: none \!important; } }
        </style>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @filamentStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        {{ \Filament\Support\Facades\FilamentView::renderHook('head.end') }}
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex flex-col min-h-screen">
        {{ \Filament\Support\Facades\FilamentView::renderHook('body.start') }}
        
        <!-- Top navbar -->
        <header class="w-full bg-white dark:bg-[#161615] border-b border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center transition duration-300 ease-in-out">
                    <a href="/"
                     class="text-xl inline-block px-5 py-1.5 bg-black hover:bg-amber-400 dark:bg-black dark:hover:bg-amber-400 text-amber-500 dark:text-amber-400 hover:dark:text-black font-bold border border-amber-500 dark:border-amber-400 rounded-sm text-sm leading-normal"
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
                        <a href="/#about"
                            class="inline-block px-5 py-1.5 bg-amber-400 hover:bg-black dark:bg-amber-400 dark:hover:black text-black hover:text-amber-400 font-bold border border-black dark:border-amber-400 hover:dark:border-amber-400 rounded-sm text-sm leading-normal"
                            >
                            About
                        </a>
                        @auth
                            <a href="{{ filament()->getHomeUrl() }}"
                                class="inline-block px-5 py-1.5 bg-amber-400 hover:bg-black dark:bg-amber-400 dark:hover:black text-black hover:text-amber-400 font-bold border border-black dark:border-amber-400 hover:dark:border-amber-400 rounded-sm text-sm leading-normal"
                            >
                                Admin Panel
                            </a>
                            <form method="POST" action="{{ route('filament.auth.logout') }}" class="inline-block">
                                @csrf
                                <button type="submit"
                                    class="inline-block px-5 py-1.5 bg-black hover:bg-amber-400 dark:bg-black dark:hover:bg-amber-400 text-amber-500 dark:text-amber-400 hover:dark:text-black font-bold border border-amber-500 dark:border-amber-400 rounded-sm text-sm leading-normal"
                                >
                                    Sign out
                                </button>
                            </form>
                        @else
                            <a href="{{ filament()->getLoginUrl() }}"
                                class="inline-block px-5 py-1.5 bg-amber-400 hover:bg-black dark:bg-amber-400 dark:hover:black text-black hover:text-amber-400 font-bold border border-black dark:border-amber-400 hover:dark:border-amber-400 rounded-sm text-sm leading-normal"
                            >
                                Sign in
                            </a>
                            @if (filament()->getRegistrationUrl())
                                <a href="{{ filament()->getRegistrationUrl() }}"
                                    class="inline-block px-5 py-1.5 bg-black hover:bg-amber-400 dark:bg-black dark:hover:bg-amber-400 text-amber-500 dark:text-amber-400 hover:dark:text-black font-bold border border-amber-500 dark:border-amber-400 rounded-sm text-sm leading-normal"
                                >
                                    Sign up
                                </a>
                            @endif
                        @endauth
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
                    <a href="/#about" class="block px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-amber-600 dark:hover:text-amber-400">About</a>
                    @auth
                        <a href="{{ filament()->getHomeUrl() }}" class="block px-3 py-2 text-sm font-medium text-amber-600 dark:text-amber-400">Admin Panel</a>
                        <form method="POST" action="{{ route('filament.auth.logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-amber-600 dark:hover:text-amber-400 border-t border-[#e3e3e0] dark:border-[#3E3E3A] mt-2 pt-2">Sign out</button>
                        </form>
                    @else
                        <a href="{{ filament()->getLoginUrl() }}" class="block px-3 py-2 text-sm font-medium text-amber-600 dark:text-amber-400">Sign in</a>
                        @if (filament()->getRegistrationUrl())
                            <a href="{{ filament()->getRegistrationUrl() }}" class="block px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-amber-600 dark:hover:text-amber-400 border-t border-[#e3e3e0] dark:border-[#3E3E3A] mt-2 pt-2">Sign up</a>
                        @endif
                    @endauth
                </div>
            </div>
        </header>
        
        <script>
            // Mobile menu toggle
            document.addEventListener('DOMContentLoaded', function() {
                const btn = document.querySelector('.mobile-menu-button');
                const menu = document.querySelector('.mobile-menu');
                
                if (btn && menu) {
                    btn.addEventListener('click', () => {
                        menu.classList.toggle('hidden');
                    });
                }
            });
        </script>

        <!-- Filament content -->
        <div class="filament-app-layout flex flex-col w-full min-h-screen">
            <main class="filament-main flex-1 w-full px-4 mx-auto md:px-6 lg:px-8">
                {{ $slot ?? '' }}
            </main>
            
            {{ \Filament\Support\Facades\FilamentView::renderHook('footer.before') }}
            
            @if (config('filament.layout.footer.should_show_logo'))
                <div class="py-4 shrink-0">
                    <div class="flex items-center justify-center space-x-2 text-sm text-gray-400 filament-footer">
                        {{ \Filament\Support\Facades\FilamentView::renderHook('footer.start') }}

                        <span>
                            {{ __('filament::layout.footer.copyright', ['year' => now()->year]) }}
                        </span>
                        
                        {{ \Filament\Support\Facades\FilamentView::renderHook('footer.end') }}
                    </div>
                </div>
            @endif
        </div>

        @filamentScripts
        
        {{ \Filament\Support\Facades\FilamentView::renderHook('body.end') }}
    </body>
</html>
EOF < /dev/null

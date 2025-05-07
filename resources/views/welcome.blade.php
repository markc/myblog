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
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        
        <!-- Dark mode initialization script -->
        <script>
            // On page load, check user preference and set class on html element
            const theme = localStorage.getItem('theme');
            
            if (theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    <body class="flex flex-col min-h-screen">
        <style>
            /* Theme-aware body styles */
            html:not(.dark) body {
                background-color: #FDFDFC !important;
                color: #1b1b18 !important;
            }
            
            html.dark body {
                background-color: #0a0a0a !important;
                color: white !important;
            }
            
            /* Theme-aware content card styles */
            html:not(.dark) .myblog-content-card {
                background-color: white !important;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
                border-radius: 0.5rem !important;
                overflow: hidden !important;
            }
            
            html.dark .myblog-content-card {
                background-color: #161615 !important;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
                border-radius: 0.5rem !important;
                overflow: hidden !important;
            }
            
            /* Theme-aware headings */
            html:not(.dark) .myblog-heading {
                color: #f59e0b !important;
                font-weight: 700 !important;
                margin-bottom: 0.5rem !important;
            }
            
            html.dark .myblog-heading {
                color: #f59e0b !important;
                font-weight: 700 !important;
                margin-bottom: 0.5rem !important;
            }
            
            /* Theme-aware text */
            html:not(.dark) .myblog-text {
                color: #4b5563 !important;
                font-size: 0.875rem !important;
            }
            
            html.dark .myblog-text {
                color: #d1d1d1 !important;
                font-size: 0.875rem !important;
            }
        </style>
        <!-- Top navbar with theme-aware styles -->
        <style>
            /* Responsive styles for the navbar that change with theme */
            .myblog-welcome-navbar {
                position: relative;
                z-index: 50;
                width: 100% !important;
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
            }
            
            /* Light mode styles */
            html:not(.dark) .myblog-welcome-navbar {
                background-color: white !important;
                border-bottom: 1px solid #e3e3e0 !important;
            }
            
            /* Dark mode styles */
            html.dark .myblog-welcome-navbar {
                background-color: #161615 !important;
                border-bottom: 1px solid #3E3E3A !important;
            }
            
            .myblog-welcome-navbar .myblog-container {
                max-width: 80rem;
                margin-left: auto;
                margin-right: auto;
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .myblog-welcome-navbar .myblog-flex {
                display: flex;
                justify-content: space-between;
                height: 4rem;
                align-items: center;
            }
            
            /* Light mode logo */
            html:not(.dark) .myblog-welcome-navbar .myblog-logo {
                display: inline-block !important;
                padding: 0.375rem 1.25rem !important;
                background-color: black !important;
                color: #f59e0b !important;
                border: 1px solid #f59e0b !important;
                border-radius: 0.125rem !important;
                font-weight: 700 !important;
                font-size: 0.875rem !important;
                line-height: 1.25 !important;
                text-decoration: none !important;
            }
            
            html:not(.dark) .myblog-welcome-navbar .myblog-logo:hover {
                background-color: #f59e0b !important;
                color: black !important;
            }
            
            /* Dark mode logo */
            html.dark .myblog-welcome-navbar .myblog-logo {
                display: inline-block !important;
                padding: 0.375rem 1.25rem !important;
                background-color: black !important;
                color: #f59e0b !important;
                border: 1px solid #f59e0b !important;
                border-radius: 0.125rem !important;
                font-weight: 700 !important;
                font-size: 0.875rem !important;
                line-height: 1.25 !important;
                text-decoration: none !important;
            }
            
            html.dark .myblog-welcome-navbar .myblog-logo:hover {
                background-color: #f59e0b !important;
                color: black !important;
            }
            
            .myblog-welcome-navbar .myblog-nav {
                display: none;
            }
            
            @media (min-width: 768px) {
                .myblog-welcome-navbar .myblog-nav {
                    display: flex;
                    align-items: flex-end;
                    gap: 1rem;
                }
            }
            
            /* Light mode buttons */
            html:not(.dark) .myblog-welcome-navbar .myblog-button {
                display: inline-block !important;
                padding: 0.375rem 1.25rem !important;
                background-color: #f59e0b !important;
                color: black !important;
                border: 1px solid black !important;
                border-radius: 0.125rem !important;
                font-weight: 700 !important;
                font-size: 0.875rem !important;
                line-height: 1.25 !important;
                text-decoration: none !important;
            }
            
            html:not(.dark) .myblog-welcome-navbar .myblog-button:hover {
                background-color: black !important;
                color: #f59e0b !important;
            }
            
            /* Dark mode buttons */
            html.dark .myblog-welcome-navbar .myblog-button {
                display: inline-block !important;
                padding: 0.375rem 1.25rem !important;
                background-color: #f59e0b !important;
                color: black !important;
                border: 1px solid black !important;
                border-radius: 0.125rem !important;
                font-weight: 700 !important;
                font-size: 0.875rem !important;
                line-height: 1.25 !important;
                text-decoration: none !important;
            }
            
            html.dark .myblog-welcome-navbar .myblog-button:hover {
                background-color: black !important;
                color: #f59e0b !important;
            }
            
            /* Light mode alt buttons */
            html:not(.dark) .myblog-welcome-navbar .myblog-button-alt {
                display: inline-block !important;
                padding: 0.375rem 1.25rem !important;
                background-color: black !important;
                color: #f59e0b !important;
                border: 1px solid #f59e0b !important;
                border-radius: 0.125rem !important;
                font-weight: 700 !important;
                font-size: 0.875rem !important;
                line-height: 1.25 !important;
                text-decoration: none !important;
            }
            
            html:not(.dark) .myblog-welcome-navbar .myblog-button-alt:hover {
                background-color: #f59e0b !important;
                color: black !important;
            }
            
            /* Dark mode alt buttons */
            html.dark .myblog-welcome-navbar .myblog-button-alt {
                display: inline-block !important;
                padding: 0.375rem 1.25rem !important;
                background-color: black !important;
                color: #f59e0b !important;
                border: 1px solid #f59e0b !important;
                border-radius: 0.125rem !important;
                font-weight: 700 !important;
                font-size: 0.875rem !important;
                line-height: 1.25 !important;
                text-decoration: none !important;
            }
            
            html.dark .myblog-welcome-navbar .myblog-button-alt:hover {
                background-color: #f59e0b !important;
                color: black !important;
            }
            
            .myblog-welcome-navbar .myblog-mobile-button {
                display: flex;
                align-items: center;
            }
            
            @media (min-width: 768px) {
                .myblog-welcome-navbar .myblog-mobile-button {
                    display: none;
                }
            }
            
            /* Light mode mobile icon */
            html:not(.dark) .myblog-welcome-navbar .myblog-mobile-icon {
                padding: 0.5rem;
                border-radius: 0.375rem;
                color: #4b5563; /* gray-600 */
            }
            
            html:not(.dark) .myblog-welcome-navbar .myblog-mobile-icon:hover {
                background-color: #f3f4f6; /* gray-100 */
            }
            
            /* Dark mode mobile icon */
            html.dark .myblog-welcome-navbar .myblog-mobile-icon {
                padding: 0.5rem;
                border-radius: 0.375rem;
                color: #d1d1d1;
            }
            
            html.dark .myblog-welcome-navbar .myblog-mobile-icon:hover {
                background-color: #1f1f1f;
            }
            
            /* Light mode mobile menu */
            html:not(.dark) .myblog-welcome-navbar .myblog-mobile-menu {
                border-top: 1px solid #e3e3e0;
                display: none;
            }
            
            /* Dark mode mobile menu */
            html.dark .myblog-welcome-navbar .myblog-mobile-menu {
                border-top: 1px solid #3E3E3A;
                display: none;
            }
            
            @media (min-width: 768px) {
                .myblog-welcome-navbar .myblog-mobile-menu {
                    display: none !important;
                }
            }
            
            .myblog-welcome-navbar .myblog-mobile-menu.is-open {
                display: block;
            }
            
            /* Light mode mobile items */
            html:not(.dark) .myblog-welcome-navbar .myblog-mobile-item {
                display: block;
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
                font-weight: 500;
                color: #4b5563; /* gray-600 */
                text-decoration: none;
            }
            
            html:not(.dark) .myblog-welcome-navbar .myblog-mobile-item:hover {
                color: #f59e0b;
            }
            
            html:not(.dark) .myblog-welcome-navbar .myblog-mobile-item.active {
                color: #f59e0b;
            }
            
            /* Dark mode mobile items */
            html.dark .myblog-welcome-navbar .myblog-mobile-item {
                display: block;
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
                font-weight: 500;
                color: #d1d1d1;
                text-decoration: none;
            }
            
            html.dark .myblog-welcome-navbar .myblog-mobile-item:hover {
                color: #f59e0b;
            }
            
            html.dark .myblog-welcome-navbar .myblog-mobile-item.active {
                color: #f59e0b;
            }
            
            /* Light mode mobile divider */
            html:not(.dark) .myblog-welcome-navbar .myblog-mobile-divider {
                border-top: 1px solid #e3e3e0;
                margin-top: 0.5rem;
                padding-top: 0.5rem;
            }
            
            /* Dark mode mobile divider */
            html.dark .myblog-welcome-navbar .myblog-mobile-divider {
                border-top: 1px solid #3E3E3A;
                margin-top: 0.5rem;
                padding-top: 0.5rem;
            }
        </style>

        <!-- Top navbar -->
        <header class="myblog-welcome-navbar">
            <div class="myblog-container">
                <div class="myblog-flex">
                    <a href="/" class="myblog-logo">
                        MyBlog
                    </a>

                    <!-- Navigation links -->
                    <div class="myblog-nav">
                        <a href="/blogs" class="myblog-button">
                            Blog
                        </a>
                        <a href="#about" class="myblog-button">
                            About
                        </a>
                        <a href="{{ url('/admin/login') }}" class="myblog-button">
                            Sign in
                        </a>
                        <a href="{{ url('/admin/register') }}" class="myblog-button-alt">
                            Sign up
                        </a>
                        <a href="#" onclick="toggleTheme(); return false;" class="myblog-button">
                            <span class="dark:hidden">🌙</span>
                            <span class="hidden dark:inline">☀️</span>
                        </a>
                    </div>
                    
                    <!-- Mobile menu button -->
                    <div class="myblog-mobile-button">
                        <button type="button" class="myblog-mobile-icon" id="welcome-mobile-menu-button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu (hidden by default) -->
            <div class="myblog-mobile-menu" id="welcome-mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="/" class="myblog-mobile-item">Home</a>
                    <a href="/blogs" class="myblog-mobile-item">Blog</a>
                    <a href="#about" class="myblog-mobile-item">About</a>
                    <a href="#" onclick="toggleTheme(); return false;" class="myblog-mobile-item">
                        <span class="dark:hidden">🌙 Dark Mode</span>
                        <span class="hidden dark:inline">☀️ Light Mode</span>
                    </a>
                    <a href="{{ url('/admin/login') }}" class="myblog-mobile-item active">Sign in</a>
                    <a href="{{ url('/admin/register') }}" class="myblog-mobile-item myblog-mobile-divider">Sign up</a>
                </div>
            </div>
        </header>
        
        <!-- Mobile menu toggle script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Mobile menu toggle with unique ID to avoid conflicts
                const btn = document.getElementById('welcome-mobile-menu-button');
                const menu = document.getElementById('welcome-mobile-menu');
                
                if (btn && menu) {
                    btn.addEventListener('click', function() {
                        menu.classList.toggle('is-open');
                    });
                }
            });
        </script>
        
        <!-- Main content with theme-aware styles -->
        <main class="flex-grow p-6 lg:p-8">
            <div class="max-w-7xl mx-auto flex flex-col gap-16 py-8 px-4 sm:px-6 lg:px-8">
                <!-- First row: 4 cards across -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="myblog-content-card">
                        <div class="p-6 text-center">
                            <h2 class="myblog-heading text-xl">Card 1</h2>
                            <p class="myblog-text">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="myblog-content-card">
                        <div class="p-6 text-center">
                            <h2 class="myblog-heading text-xl">Card 2</h2>
                            <p class="myblog-text">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="myblog-content-card">
                        <div class="p-6 text-center">
                            <h2 class="myblog-heading text-xl">Card 3</h2>
                            <p class="myblog-text">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="myblog-content-card">
                        <div class="p-6 text-center">
                            <h2 class="myblog-heading text-xl">Card 4</h2>
                            <p class="myblog-text">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                </div>
                
                <!-- Second row: 3 cards across -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="myblog-content-card">
                        <div class="p-6 text-center">
                            <h2 class="myblog-heading text-xl">Card 5</h2>
                            <p class="myblog-text">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="myblog-content-card">
                        <div class="p-6 text-center">
                            <h2 class="myblog-heading text-xl">Card 6</h2>
                            <p class="myblog-text">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="myblog-content-card">
                        <div class="p-6 text-center">
                            <h2 class="myblog-heading text-xl">Card 7</h2>
                            <p class="myblog-text">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                </div>
                
                <!-- Third row: 2 cards across -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="myblog-content-card">
                        <div class="p-6 text-center">
                            <h2 class="myblog-heading text-xl">Card 8</h2>
                            <p class="myblog-text">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                    
                    <div class="myblog-content-card">
                        <div class="p-6 text-center">
                            <h2 class="myblog-heading text-xl">Card 9</h2>
                            <p class="myblog-text">We're working on something awesome. Check back soon!</p>
                        </div>
                    </div>
                </div>
                
                <!-- Fourth row: 1 card full width at double height -->
                <div id="about" class="myblog-content-card">
                    <div class="p-8 text-center min-h-[300px] flex flex-col justify-center">
                        <h1 class="myblog-heading text-3xl">About Us</h1>
                        <p class="myblog-text max-w-3xl mx-auto">
                            We're working on something awesome. Check back soon for more updates about our blog and services.
                            This space will contain more information about our team and mission once our website is fully launched.
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Global Footer with consistent theme-aware styling -->
        <style>
            /* Responsive styles for the welcome footer that change with theme */
            .myblog-welcome-footer {
                width: 100% !important;
                box-shadow: 0 -1px 2px 0 rgba(0, 0, 0, 0.05) !important;
            }
            
            /* Light mode styles */
            html:not(.dark) .myblog-welcome-footer {
                background-color: white !important;
                border-top: 1px solid #e3e3e0 !important;
            }
            
            /* Dark mode styles */
            html.dark .myblog-welcome-footer {
                background-color: #161615 !important;
                border-top: 1px solid #3E3E3A !important;
            }
            
            .myblog-welcome-footer .myblog-container {
                max-width: 80rem;
                margin-left: auto;
                margin-right: auto;
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .myblog-welcome-footer .myblog-flex {
                display: flex;
                justify-content: center;
                height: 4rem;
                align-items: center;
            }
            
            /* Light mode text */
            html:not(.dark) .myblog-welcome-footer .myblog-text {
                color: #f59e0b !important;
                font-size: 0.875rem !important;
            }
            
            /* Dark mode text */
            html.dark .myblog-welcome-footer .myblog-text {
                color: #f59e0b !important;
                font-size: 0.875rem !important;
            }
        </style>

        <footer class="myblog-welcome-footer">
            <div class="myblog-container">
                <div class="myblog-flex">
                    <span class="myblog-text">
                        &copy; {{ date('Y') }} MyBlog. All rights reserved.
                    </span>
                </div>
            </div>
        </footer>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
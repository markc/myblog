<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ $setting?->faviconImage }}" type="image/x-icon" />
    {!! \Firefly\FilamentBlog\Facades\SEOMeta::generate() !!}
    {!! $setting?->google_console_code !!}
    {!! $setting?->google_analytic_code !!}
    {!! $setting?->google_adsense_code !!}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom blog styles -->
    <link href="{{ asset('css/blog-custom.css') }}" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                container: {
                    padding: '1rem',
                    screen: {
                        '2xl': '1200px'
                    }
                },
                extend: {
                    colors: {
                        'amber': {
                            400: '#f59e0b',
                            500: '#f59e0b',
                        },
                        'primary': {
                            DEFAULT: '#f59e0b',
                            50: '#fff9f5',
                            100: '#FFF7EC',
                            200: '#FEE4C4',
                            300: '#FED29C',
                            400: '#FDC073',
                            500: '#f59e0b',
                            600: '#FC9514',
                            700: '#D57802',
                            800: '#9E5902',
                            900: '#663901',
                            950: '#4B2A01'
                        }
                    }
                }
            },
            darkMode: 'class'
        }
    </script>
    
    <style>
        :root {
            color-scheme: light dark;
        }
        
        body {
            font-family: "Instrument Sans", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .line-clamp-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
    </style>
    
    <style>
        /* Blog Posts in light/dark mode */
        article h1 {
            line-height: 1.2;
            font-size: 2rem;
            color: #1b1b18;
            font-weight: 900;
            padding-bottom: 20px;
        }
        
        .dark article h1 {
            color: #e5e5e5;
        }

        article h2 {
            line-height: 1.2;
            font-size: 1.5rem;
            color: #1b1b18;
            font-weight: 800;
            padding-bottom: 10px;
        }
        
        .dark article h2 {
            color: #e5e5e5;
        }

        article h3 {
            line-height: 1.2;
            font-size: 1.25rem;
            color: #1b1b18;
            font-weight: 700;
            padding-bottom: 10px;
        }
        
        .dark article h3 {
            color: #e5e5e5;
        }

        article h4 {
            line-height: 1.2;
            font-size: 1.2rem;
            color: #1b1b18;
            font-weight: 600;
            padding-bottom: 10px;
        }
        
        .dark article h4 {
            color: #e5e5e5;
        }

        article p {
            line-height: 1.75;
            letter-spacing: .2px;
            font-size: 1rem;
            color: #1b1b18;
            font-weight: 400;
            margin-bottom: 1rem;
        }
        
        .dark article p {
            color: #d1d1d1;
        }

        article ul {
            line-height: 1.7;
            padding-bottom: 5px;
            color: #1b1b18;
        }
        
        .dark article ul {
            color: #d1d1d1;
        }

        article table {
            margin-top: 2rem;
            margin-bottom: 2rem;
            border-radius: 10px;
        }

        article table,
        article table td,
        article table th {
            border: 1px solid #e3e3e0;
            padding: 5px 10px;
        }
        
        .dark article table,
        .dark article table td,
        .dark article table th {
            border: 1px solid #3E3E3A;
        }

        /* share this */
        .sharethis-inline-share-buttons {
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
        }

        .sharethis-inline-share-buttons .st-btn {
            width: 50px !important;
            height: 50px !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            margin-bottom: 10px !important;
            border-radius: 50px !important;
            margin-right: 0 !important
        }

        .sharethis-inline-share-buttons .st-btn img {
            top: 0 !important
        }
    </style>
    
    <script>
        // Dark mode detection and setting
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('theme') === 'dark' || 
                (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    </script>
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-white antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Custom MyBlog Header -->
        @include('filament.layouts.app-header')
        
        <!-- Original Blog Header -->
        <x-blog-header title="{{ $setting?->title }}" logo="{{ $setting?->logoImage }}" />
        
        <!-- Page Content -->
        <main class="flex-grow">
            <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <!-- Global Footer -->
        @include('filament.layouts.app-footer')
        
        <!-- Mobile navigation for blog only -->
        <div class="fixed bottom-0 left-0 z-50 h-16 w-full border-t border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#161615] sm:hidden">
            <div class="mx-auto grid h-full max-w-lg grid-cols-2 justify-center font-medium">
                <a href="{{ route('filamentblog.post.index') }}"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 w-5 text-amber-500 dark:text-amber-400" viewBox="0 0 256 256">
                        <path fill="currentColor"
                            d="m217.47 105.24l-80-75.5l-.09-.08a13.94 13.94 0 0 0-18.83 0l-.09.08l-80 75.5A14 14 0 0 0 34 115.55V208a14 14 0 0 0 14 14h48a14 14 0 0 0 14-14v-48a2 2 0 0 1 2-2h32a2 2 0 0 1 2 2v48a14 14 0 0 0 14 14h48a14 14 0 0 0 14-14v-92.45a14 14 0 0 0-4.53-10.31M210 208a2 2 0 0 1-2 2h-48a2 2 0 0 1-2-2v-48a14 14 0 0 0-14-14h-32a14 14 0 0 0-14 14v48a2 2 0 0 1-2 2H48a2 2 0 0 1-2-2v-92.45a2 2 0 0 1 .65-1.48l.09-.08l79.94-75.48a2 2 0 0 1 2.63 0L209.26 114l.08.08a2 2 0 0 1 .66 1.48Z" />
                    </svg>
                    <span class="text-xs text-gray-600 dark:text-gray-300">Home</span>
                </a>
                <a href="{{ route('filamentblog.post.all') }}"
                    class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 w-5 text-amber-500 dark:text-amber-400" viewBox="0 0 256 256">
                        <path fill="currentColor"
                            d="M216 40H40a16 16 0 0 0-16 16v160a8 8 0 0 0 11.58 7.15L64 208.94l28.42 14.21a8 8 0 0 0 7.16 0L128 208.94l28.42 14.21a8 8 0 0 0 7.16 0L192 208.94l28.42 14.21A8 8 0 0 0 232 216V56a16 16 0 0 0-16-16m0 163.06l-20.42-10.22a8 8 0 0 0-7.16 0L160 207.06l-28.42-14.22a8 8 0 0 0-7.16 0L96 207.06l-28.42-14.22a8 8 0 0 0-7.16 0L40 203.06V56h176ZM136 112a8 8 0 0 1 8-8h48a8 8 0 0 1 0 16h-48a8 8 0 0 1-8-8m0 32a8 8 0 0 1 8-8h48a8 8 0 0 1 0 16h-48a8 8 0 0 1-8-8m-72 24h48a8 8 0 0 0 8-8V96a8 8 0 0 0-8-8H64a8 8 0 0 0-8 8v64a8 8 0 0 0 8 8m8-64h32v48H72Z" />
                    </svg>
                    <span class="text-xs text-gray-600 dark:text-gray-300">All Posts</span>
                </a>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("comment-box").submit();
        }
    </script>
</body>

</html>

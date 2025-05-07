@props(['title' =>'MyBlog', 'logo' => null] )
<header @click.outside="showSearchModal = false" x-data="{ showSearchModal: false }" class="w-full bg-white dark:bg-[#161615] border-b border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm mb-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between gap-x-4 h-16 items-center transition duration-300 ease-in-out">
            <div class="flex items-center gap-x-10">
                <a href="{{config('filamentblog.route.home.url') ?? config('app.url')}}">
                    @if($logo)
                    <img src="{{ $logo }}" alt="{{ $title }}" class="max-h-[40px]" />
                    @else
                    <span class="inline-block px-5 py-1.5 bg-black hover:bg-amber-400 dark:bg-black dark:hover:bg-amber-400 text-amber-500 dark:text-amber-400 hover:dark:text-black font-bold border border-amber-500 dark:border-amber-400 rounded-sm text-sm leading-normal">
                        {{ $title ?: 'MyBlog' }}
                    </span>
                    @endif
                </a>
                <div class="hidden gap-x-4 sm:flex">
                    <a href="{{ route('filamentblog.post.index') }}" class="inline-block px-5 py-1.5 bg-amber-400 hover:bg-black dark:bg-amber-400 dark:hover:black text-black hover:text-amber-400 font-bold border border-black dark:border-amber-400 hover:dark:border-amber-400 rounded-sm text-sm leading-normal">
                        <span>Blogs</span>
                    </a>
                    <div class="relative group">
                        <button class="inline-block px-5 py-1.5 bg-amber-400 hover:bg-black dark:bg-amber-400 dark:hover:black text-black hover:text-amber-400 font-bold border border-black dark:border-amber-400 hover:dark:border-amber-400 rounded-sm text-sm leading-normal">
                            <span>Categories</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 inline-block ml-1" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m19 9l-7 6l-7-6" />
                            </svg>
                        </button>
                        <div class="absolute right-0 z-50 group-hover:pointer-events-auto top-[calc(100%+0.5rem)] origin-left pt-2 opacity-0 pointer-events-none transition will-change-transform lg:left-[50%] lg:right-auto lg:translate-x-[-50%] group-hover:opacity-100">
                            <x-blog-header-category />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center ml-auto gap-x-2">
                <form action="{{ route('filamentblog.post.search') }}" method="GET">
                    <div class="relative">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute w-5 h-5 -translate-y-1/2 pointer-events-none left-3 top-1/2 text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="11.5" cy="11.5" r="9.5" />
                                    <path stroke-linecap="round" d="M18.5 18.5L22 22" />
                                </g>
                            </svg>
                            <input placeholder="Search" type="text" name="query" value="{{ request()->get('query') }}" class="w-full px-4 py-2 pl-10 text-sm font-medium border rounded-md border-[#e3e3e0] dark:border-[#3E3E3A] outline-none bg-white dark:bg-[#161615] text-gray-700 dark:text-gray-300 focus:ring-1 focus:ring-amber-400 placeholder:text-gray-400 dark:placeholder:text-gray-500" />
                        </div>
                        @error('query')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

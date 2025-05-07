<div class="top-20 min-w-[15rem] origin-left transition duration-200 will-change-[shadow] translate-y-0">
    <div class="relative z-0 rounded-md border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#161615] py-4 shadow-lg">
        <div class="max-h-[65vh] list-none overflow-y-auto transition-all duration-300 translate-y-0 opacity-100">
            @foreach($categories as $category)
                <a href="{{ route('filamentblog.category.post', ['category' => $category->slug]) }}"
                   class="py-2 block text-sm font-medium transition-all duration-300 cursor-pointer text-gray-700 dark:text-gray-300 hover:text-amber-500 dark:hover:text-amber-400 px-6 capitalize"
                >
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>

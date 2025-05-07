@props(['post'])
<div class="grid sm:grid-cols-2 gap-y-5 gap-x-10 p-6 bg-white dark:bg-[#161615] rounded-lg border border-[#e3e3e0] dark:border-[#3E3E3A] shadow-md">
    <div class="md:h-[400px] w-full overflow-hidden rounded-lg bg-gray-200 dark:bg-gray-800">
        <img class="flex h-full w-full items-center justify-center md:object-cover object-contain object-center" 
             src="{{ asset($post->featurePhoto) }}" alt="{{ $post->photo_alt_text }}">
    </div>
    <div class="flex flex-col justify-center space-y-6 py-4 sm:pl-10">
        <div>
            <div class="mb-5">
                <a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}" 
                   class="mb-4 block text-xl md:text-3xl font-bold text-gray-800 dark:text-gray-100 hover:text-amber-500 dark:hover:text-amber-400">
                    {{ $post->title }}
                </a>
                <div class="mt-3">
                    @foreach ($post->categories as $category)
                    <a href="{{ route('filamentblog.category.post', ['category' => $category->slug]) }}">
                        <span class="bg-amber-100 dark:bg-amber-900 text-amber-800 dark:text-amber-200 mr-2 inline-flex rounded-md px-3 py-1 text-xs font-bold">
                            {{ $category->name }}
                        </span>
                    </a>
                    @endforeach
                </div>
            </div>
            <p class="mb-4 text-gray-600 dark:text-gray-300">
                {!! Str::limit($post->sub_title) !!}
            </p>
            <a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}" 
               class="inline-block px-5 py-1.5 bg-amber-400 hover:bg-black dark:bg-amber-400 dark:hover:black text-black hover:text-amber-400 font-bold border border-black dark:border-amber-400 hover:dark:border-amber-400 rounded-sm text-sm leading-normal mt-2">
                Read More
            </a>
        </div>
        <div class="flex items-center gap-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A] pt-4 mt-4">
            <img class="h-12 w-12 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-800 object-cover text-[0]" 
                 src="{{ $post->user->avatar }}" alt="{{ $post->user->name() }}">
            <div>
                <span title="{{ $post->user->name() }}" 
                      class="block max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap font-semibold text-gray-800 dark:text-gray-100">
                    {{ $post->user->name() }}
                </span>
                <span class="block whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                    {{ $post->formattedPublishedDate() }}
                </span>
            </div>
        </div>
    </div>
</div>

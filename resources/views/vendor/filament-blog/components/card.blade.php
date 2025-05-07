@props(['post'])
<a href="{{ route('filamentblog.post.show', ['post' => $post->slug]) }}" class="block bg-white dark:bg-[#161615] hover:shadow-md dark:hover:shadow-lg shadow-sm rounded-lg overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A] transition duration-300">
    <div class="group/blog-item flex flex-col gap-y-4">
        <div class="h-[250px] w-full bg-gray-200 dark:bg-gray-800 overflow-hidden">
            <img class="flex h-full w-full items-center justify-center object-cover object-center"
                 src="{{ asset($post->featurePhoto) }}" alt="{{ $post->photo_alt_text }}">
        </div>
        <div class="flex flex-col justify-between space-y-3 p-4">
            <div>
                <h2 title="{{ $post->title }}"
                    class="mb-3 line-clamp-2 text-xl font-bold text-gray-800 dark:text-gray-100 group-hover/blog-item:text-amber-500 dark:group-hover/blog-item:text-amber-400">
                    {{ $post->title }}
                </h2>
                <p class="mb-3 line-clamp-3 text-gray-600 dark:text-gray-300">
                    {{ Str::limit($post->sub_title, 100) }}
                </p>
            </div>
            <div class="flex items-center gap-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A] pt-3">
                <img class="h-10 w-10 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-800 object-cover text-[0]"
                     src="{{ $post->user->avatar }}" alt="{{ $post->user->name() }}">
                <div>
                    <span title="{{ $post->user->name() }}"
                          class="block max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap text-sm font-semibold text-gray-800 dark:text-gray-100">
                          {{ $post->user->name() }}
                    </span>
                    <span class="block whitespace-nowrap text-xs text-gray-500 dark:text-gray-400">
                        {{ $post->formattedPublishedDate() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</a>

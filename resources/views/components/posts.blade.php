@foreach ($posts as $post)
    <article class="">
        <div class="prose prose-zinc max-w-none dark:prose-invert sm:prose-lg">
            <p class="text-sm text-gray-500">{{ now()->parse($post->created_at)->format('M d, Y') }}</p>
            <h2 class="mt-3 text-lg font-medium text-gray-800 dark:text-gray-200">
                <a class="hover:underline focus:underline" href="/blog/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="mt-3 text-base leading-relaxed text-gray-500">{{ $post->excerpt }} </p>
            <p class="mt-3 text-base text-gray-700 dark:text-gray-300">
                <a class="hover:underline focus:underline" href="/blog/{{ $post->slug }}">Read
                    article →</a>
            </p>
        </div>
    </article>
@endforeach

<x-layout title="{{ $post->title }}">
    <x-container>
        <section>
            <article class="">
                <div class="prose prose-zinc max-w-none dark:prose-invert sm:prose-lg">
                    <p>{{ now()->parse($post->created_at)->format('M d, Y') }}</p>
                    <h1>
                        {{ $post->title }}
                    </h1>
                    <div>
                        {!! str()->markdown($post->body()) !!}
                    </div>
                </div>
            </article>
        </section>
    </x-container>
</x-layout>

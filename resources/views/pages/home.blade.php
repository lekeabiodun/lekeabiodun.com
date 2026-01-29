<x-layout title="Homepage">
    <article class="flex flex-1 items-center justify-center">
        <div class="w-full max-w-3xl px-4 py-12">
            <div class="prose prose-zinc mt-8 max-w-none dark:prose-invert sm:prose-lg">
                <h1>Builder. Bug Hunter. Engineer.</h1>

                <p>
                    I fix bugs for a living, helping customers and dev teams ship cleaner, more stable code.
                </p>

                <h2>
                    <a href="/blog">
                        Blogs
                    </a>
                </h2>
                <section>
                    <x-posts :posts="$posts" />
                </section>
            </div>
        </div>

    </article>
</x-layout>

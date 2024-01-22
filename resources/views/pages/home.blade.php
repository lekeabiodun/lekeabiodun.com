<x-layout title="Homepage">
    <article class="flex flex-1 items-center justify-center">
        <div class="w-full max-w-3xl px-4 py-12">
            <div class="prose prose-zinc mt-8 max-w-none dark:prose-invert sm:prose-lg">
                <h1>Full-stack developer and wanna-be entrepreneur.</h1>

                <p>Hi there! I'm <strong>Leke Abiodun</strong> from Nigeria, I love writing <strong>codes</strong> that
                    solve
                    <strong>unique</strong>
                    problems and
                    create <strong>solutions</strong> that drive business growth.
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

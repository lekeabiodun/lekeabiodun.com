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
                    {{-- , I'm a
                    <strong>performance-driven</strong> and motivated Full-Stack
                    Developer. --}}

                    {{-- I'm currently building
                    <a href="https://autorenew.ng">AutoRenew</a> and <a href="https://asake.app/">Asake</a>, and I
                    work with the team at <a href="https://metarelic.com">Metarelic</a>. --}}
                </p>

                <section>
                    <x-posts :posts="$posts" />
                </section>
            </div>
        </div>

    </article>
</x-layout>

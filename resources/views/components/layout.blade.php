<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F797SLLX50"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-F797SLLX50');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-seo />

    <title>{{ config('app.name', 'Leke Abiodun') }} - {{ $title ?? '' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=inter:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        const setDarkClass = () => {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                    '(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        }

        setDarkClass()

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', setDarkClass)
    </script>

</head>

<body class="flex min-h-screen flex-col bg-white selection:bg-indigo-500 selection:text-white dark:bg-gray-900"
    x-data="{ menu: false }" x-init="$watch('menu', value => value ?
        document.body.classList.add('overflow-hidden') :
        document.body.classList.remove('overflow-hidden')
    )">
    <x-header />

    <main class="flex flex-1 flex-col">
        {{ $slot }}
    </main>

    <x-subscriber />

    <x-footer />
</body>

</html>

<header class="sticky top-0 z-10 flex h-20 items-center bg-white/80 backdrop-blur-md dark:bg-gray-900/60">
    <div class="mx-auto flex w-full max-w-4xl items-center px-4">
        <div class="flex-1">
            <a class="group relative block h-14 w-14 rounded-full border-2 border-white shadow dark:border-gray-700"
                href="{{ url('/') }}">
                <img class="absolute inset-0 rounded-full transition-all duration-150 group-hover:opacity-80"
                    src="{{ asset('img/leke-abiodun.png') }}" alt="Leke Abiodun" />
            </a>
        </div>

        <nav class="hidden flex-1 sm:block">
            <ul class="flex justify-center gap-6">
                <x-menu />
            </ul>
        </nav>

        <div class="flex flex-1 items-center justify-end gap-4">
            <div class="relative" x-data="{
                menu: false,
                theme: localStorage.theme,
                darkMode() {
                    this.theme = 'dark'
                    localStorage.theme = 'dark'
                    setDarkClass()
                },
                lightMode() {
                    this.theme = 'light'
                    localStorage.theme = 'light'
                    setDarkClass()
                },
                systemMode() {
                    this.theme = undefined
                    localStorage.removeItem('theme')
                    setDarkClass()
                },
            }" @click.outside="menu = false">
                <button
                    class="focus:hover-gray-50 dark:focus:hover-gray-800 rounded-full border p-1 hover:border-gray-300 hover:bg-gray-50 dark:border-gray-700 dark:hover:border-gray-600 dark:hover:bg-gray-800 dark:focus:border-gray-600"
                    x-cloak
                    :class="theme ? 'text-gray-700 dark:text-gray-300' :
                        'text-gray-400 dark:text-gray-600 hover:text-gray-500 focus:text-gray-500 dark:hover:text-gray-500 dark:focus:text-gray-500'"
                    @click="menu = ! menu">
                    <svg class="block h-6 w-6 dark:hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                    </svg>
                    <svg class="hidden h-6 w-6 dark:block" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                    </svg>
                </button>

                <div class="absolute right-0 flex origin-top-right flex-col rounded-md bg-white py-2 shadow-xl dark:bg-gray-800"
                    style="display: none;" x-show="menu" @click="menu = false">
                    <button class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700"
                        :class="theme === 'light' ? 'text-gray-900 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400'"
                        @click="lightMode()">
                        <svg class="h-5 w-5 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <span class="ml-2 text-sm">Light</span>
                    </button>
                    <button class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700"
                        :class="theme === 'dark' ? 'text-gray-900 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400'"
                        @click="darkMode()">
                        <svg class="h-5 w-5 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                        <span class="ml-2 text-sm">Dark</span>
                    </button>
                    <button class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700"
                        :class="theme === undefined ? 'text-gray-900 dark:text-gray-100' :
                            'text-gray-500 dark:text-gray-400'"
                        @click="systemMode()">
                        <svg class="h-5 w-5 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                        </svg>
                        <span class="ml-2 text-sm">System</span>
                    </button>
                </div>
            </div>
            <button class="sm:hidden" @click="menu = ! menu">
                <svg class="h-6 w-6 text-gray-700 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </div>
</header>

<div class="fixed inset-0 z-20 bg-white dark:bg-gray-900" style="display: none;" x-show="menu">
    <div class="flex h-20 items-center justify-between px-4">
        <a class="group relative block h-14 w-14 rounded-full border-2 border-white shadow dark:border-gray-700"
            href="{{ url('/') }}">
            <img class="absolute inset-0 rounded-full transition-all duration-150 group-hover:opacity-80"
                src="{{ asset('img/leke-abiodun.png') }}" alt="Leke Abiodun" />
        </a>
        <button @click="menu = ! menu">
            <svg class="h-6 w-6 text-gray-700 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <nav class="px-4 text-right">
        <ul class="flex flex-col gap-6">
            <x-menu />
        </ul>
    </nav>
</div>

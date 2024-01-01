<li>

    <a class="{{ request()->pageIs('/') ? 'text-gray-900 dark:text-gray-100 underline underline-offset-4 decoration-gray-400 dark:decoration-gray-600' : 'text-gray-500 border-transparent' }} py-1 font-medium hover:text-gray-900 dark:hover:text-gray-100"
        href="{{ url('/') }}">
        Home
    </a>
</li>

<li>
    <a class="{{ request()->pageIs('about') ? 'text-gray-900 dark:text-gray-100 underline underline-offset-4 decoration-gray-400 dark:decoration-gray-600' : 'text-gray-500 border-transparent' }} py-1 font-medium hover:text-gray-900 dark:hover:text-gray-100"
        href="{{ url('about') }}">
        About
    </a>
</li>

{{-- <li>
    <a class="{{ request()->pageIs('articles') ? 'text-gray-900 dark:text-gray-100 underline underline-offset-4 decoration-gray-400 dark:decoration-gray-600' : 'text-gray-500 border-transparent' }} py-1 font-medium hover:text-gray-900 dark:hover:text-gray-100"
        href="{{ url('/') }}">
        Articles
    </a>
</li> --}}

<li>
    <a class="{{ request()->pageIs('uses') ? 'text-gray-900 dark:text-gray-100 underline underline-offset-4 decoration-gray-400 dark:decoration-gray-600' : 'text-gray-500 border-transparent' }} py-1 font-medium hover:text-gray-900 dark:hover:text-gray-100"
        href="{{ url('uses') }}">
        Uses
    </a>
</li>

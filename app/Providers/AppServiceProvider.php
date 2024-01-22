<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Spatie\Export\Exporter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Exporter $exporter): void
    {
        \Illuminate\Http\Request::macro('pageIs', function ($pattern) {
            return request()->is('livewire/message/*')
                ? Str::is(url($pattern), \Illuminate\Support\Str::before(request()->header('referer'), '?'))
                : request()->is($pattern);
        });

        $exporter->crawl(false);

        $exporter->paths([
            '',
            'about',
            'uses',
            'blog',
            'blog/examples-of-good-prompt-bad-prompt',
            'blog/what-is-prompt-fu',
            'blog/prompting-good-prompt-bad-prompt',
        ]);
    }
}

<?php

namespace App\Console\Commands;

use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');
        Sitemap::create()
            ->add(Url::create('/')->setLastModificationDate(now())->setPriority(1))
            ->add(Url::create('/about')->setLastModificationDate(now())->setPriority(0.8))
            ->add(Url::create('/uses')->setLastModificationDate(now())->setPriority(0.5))
            ->add(Url::create('/blog')->setLastModificationDate(now())->setPriority(0.8))
            ->writeToFile(public_path('sitemap.xml'));
        $this->info('Done.');

    }
}

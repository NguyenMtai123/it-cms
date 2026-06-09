<?php

namespace Platform\Packages\Page\Providers;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'page');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
    }
}

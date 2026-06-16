<?php

namespace Platform\Plugins\AboutLink\Providers;

use Illuminate\Support\ServiceProvider;

class AboutLinkServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(
            __DIR__ . '/../../database/migrations'
        );

        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'about-link'
        );

        dashboard_menu([
            'name' => 'About Links',
            'icon' => 'fas fa-external-link-alt', // Recommended link icon
            'url' => '/admin/about-links', // Adjust this URL to match your route
            'permission' => 'core.system', // Adjust permission if needed
        ]);
    }
}

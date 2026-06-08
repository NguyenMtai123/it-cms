<?php

namespace Platform\Plugins\Event\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // permissions nếu cần
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'event'
        );

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        dashboard_menu([
            'name' => 'Events',
            'icon' => 'fas fa-calendar-alt',
            'url' => '/admin/events',
        ]);
    }
}

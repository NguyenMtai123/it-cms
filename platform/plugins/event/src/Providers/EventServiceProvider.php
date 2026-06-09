<?php

namespace Platform\Plugins\Event\Providers;

use Illuminate\Support\ServiceProvider;
use Platform\Plugins\Event\Models\Event;

class EventServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $permissions = require __DIR__ . '/../../config/permissions.php';

            config([
                'acl.permissions' => array_merge(
                    config('acl.permissions', []),
                    $permissions
                ),
            ]);
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
        dashboard_widget([
            'title' => 'Event',
            'value' => Event::count(),
            'icon' => 'newspaper'
        ]);
    }
}

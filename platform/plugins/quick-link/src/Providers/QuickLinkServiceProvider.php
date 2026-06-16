<?php

namespace Platform\Plugins\QuickLink\Providers;

use Illuminate\Support\ServiceProvider;

class QuickLinkServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // $permissions = require __DIR__ . '/../../config/permissions.php';

        // config([
        //     'acl.permissions' => array_merge(
        //         config('acl.permissions', []),
        //         $permissions
        //     ),
        // ]);
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadMigrationsFrom(
            __DIR__ . '/../../database/migrations'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'quick-link'
        );

        dashboard_menu([
            'name' => 'Quick Links',
            'icon' => 'fas fa-link',
            'url' => '/admin/quick-links',
            'permission' => 'quick-links.view',
        ]);
    }
}

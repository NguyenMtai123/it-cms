<?php

namespace Platform\Plugins\Page\Providers;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
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
         $this->loadMigrationsFrom(
        __DIR__ . '/../../database/migrations'
    );
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );
        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'page'
        );
        dashboard_menu([
            'id' => 'pages',
            'name' => 'Pages',
            'icon' => 'fas fa-file',
            'url' => '/admin/pages',
            'permission' => 'core.system',
        ]);
        dashboard_widget([
            'title' => 'Pages',
            'value' => \Platform\Plugins\Page\Models\Page::count(),
            'icon' => 'file',
        ]);

    }
}

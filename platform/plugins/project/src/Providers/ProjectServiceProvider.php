<?php

namespace Platform\Plugins\Project\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'project'
        );

        $this->loadMigrationsFrom(
            __DIR__ . '/../../database/migrations'
        );

        dashboard_menu([
            'name' => 'Projects',
            'icon' => 'fas fa-globe',
            'url' => '/admin/projects',
            'permission' => 'core.system',
        ]);
    }
}

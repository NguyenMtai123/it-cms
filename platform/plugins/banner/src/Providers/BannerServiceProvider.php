<?php

namespace Platform\Plugins\Banner\Providers;

use Illuminate\Support\ServiceProvider;
use Platform\Plugins\Banner\Models\Banner;

class BannerServiceProvider extends ServiceProvider
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
    public function boot()
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'banner'
        );

        $this->loadMigrationsFrom(
            __DIR__ . '/../../database/migrations'
        );
        dashboard_menu([
            'id' => 'cms-banner',
            'name' => 'Banner',
            'icon' => 'fas fa-images',
            'url' => '/admin/banner',
        ]);
        dashboard_widget([
            'title' => 'Banner',
            'value' => Banner::count(),
            'icon' => 'newspaper'
        ]);
    }

}

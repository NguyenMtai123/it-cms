<?php

namespace Platform\Core\Media\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__ . '/../../config/media.php', 'media');
        // $this->mergeConfigFrom(__DIR__ . '/../../config/permissions.php','media.permissions');
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'media');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([
            __DIR__.'/../../public' => public_path('vendor/core/media'),
        ], 'media-assets');
        Blade::component(
            'media::components.media-picker',
            'media-picker'
        );
    }
}

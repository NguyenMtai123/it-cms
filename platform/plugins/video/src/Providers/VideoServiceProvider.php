<?php

namespace Platform\Plugins\Video\Providers;

use Illuminate\Support\ServiceProvider;

class VideoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'video'
        );
        dashboard_menu([
            'name' => 'Videos',
            'icon' => 'fas fa-video',
            'url' => '/admin/videos',
            'permission' => 'core.system',
        ]);
    }
}

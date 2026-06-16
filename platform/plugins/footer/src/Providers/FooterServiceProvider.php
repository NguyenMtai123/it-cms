<?php

namespace Platform\Plugins\Footer\Providers;

use Illuminate\Support\ServiceProvider;

class FooterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // dd('Footer loaded');
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'footer'
        );

        $this->loadMigrationsFrom(
            __DIR__ . '/../../database/migrations'
        );

        dashboard_menu([
            'name' => 'Footer NTU',
            'icon' => 'fas fa-columns',
            'permission' => 'core.system',
            'children' => [

                [
                    'name' => 'Thông tin trường',
                    'url' => '/admin/footer-setting',
                    'icon' => 'far fa-circle',
                    'permission' => 'core.system',
                ],

                [
                    'name' => 'Liên kết Footer',
                    'url' => '/admin/footer-links',
                    'icon' => 'far fa-circle',
                    'permission' => 'core.system',
                ],

            ],

        ]);
    }
}

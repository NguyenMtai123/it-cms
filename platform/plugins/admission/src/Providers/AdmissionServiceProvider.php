<?php

namespace Platform\Plugins\Admission\Providers;

use Illuminate\Support\ServiceProvider;

class AdmissionServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'admission'
        );

        $this->loadMigrationsFrom(
            __DIR__ . '/../../database/migrations'
        );

        dashboard_menu([
            'name' => 'Admission',
            'icon' => 'fas fa-user-graduate',

            'children' => [

                [
                    'name' => 'Admissions',
                    'url' => '/admin/admissions',
                ],

                [
                    'name' => 'Settings',
                    'url' => '/admin/admission-settings',
                ],

            ],
        ]);
    }
}

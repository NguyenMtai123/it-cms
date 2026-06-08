<?php

namespace Platform\Core\ACL\Providers;

use Illuminate\Support\ServiceProvider;
use Platform\Core\ACL\Models\Role;
use Platform\Core\ACL\Models\User;

class AclServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/permissions.php', 'acl.permissions');
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/frontend.php'
        );

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'acl');

        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'acl');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        dashboard_widget([
        'title' => 'Users',
        'value' => User::count(),
        'icon' => 'users',
        ]);

        dashboard_widget([
            'title' => 'Roles',
            'value' => Role::count(),
            'icon' => 'user-shield',
        ]);
    }
}

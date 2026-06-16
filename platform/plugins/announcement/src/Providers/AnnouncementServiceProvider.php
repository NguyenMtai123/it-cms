<?php

namespace Platform\Plugins\Announcement\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Platform\Plugins\Announcement\Models\Announcement;

class AnnouncementServiceProvider extends ServiceProvider
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
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'announcement'
        );

        $this->loadMigrationsFrom(
            __DIR__ . '/../../database/migrations'
        );

        dashboard_menu([
            'id' => 'cms-announcements',
            'name' => 'Announcements',
            'icon' => 'fas fa-bullhorn',
            'url' => '/admin/announcements',
        ]);
        if (Schema::hasTable('announcements')) {
            dashboard_widget([
                'title' => 'Announcements',
                'value' => Announcement::count(),
                'icon' => 'bullhorn'
            ]);
        }
    }
}

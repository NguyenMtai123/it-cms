<?php

namespace Platform\Core\Base\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Platform\Core\ACL\Models\Role;
use Platform\Core\Base\Support\PluginManager;
use Platform\Core\Base\Support\PluginScanner;
use Platform\Core\Base\Support\ThemeManager;

class BaseServiceProvider extends ServiceProvider
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

        require_once __DIR__ . '/../Helpers/functions.php';

        $this->app->singleton('base.helper', function () {
            return new \Platform\Core\Base\Helpers\BaseHelper();
        });
        $this->app->register(\Platform\Packages\Slug\Providers\SlugServiceProvider::class);
        $this->app->register(\Platform\Packages\Page\Providers\PageServiceProvider::class);
    }

    public function boot(): void
    {
        // 1. load base helpers
        require_once __DIR__ . '/../Helpers/functions.php';
        PluginScanner::scan();

        // 2. load plugins (QUAN TRỌNG)
        $this->app->booted(function () {
            PluginManager::load();
        });

        $this->loadViewsFrom(
            dirname(__DIR__, 2) . '/resources/views',
            'base'
        );

        $this->loadRoutesFrom(
            dirname(__DIR__, 2) . '/routes/web.php'
        );

        Blade::component(
            'base::components.editor',
            'editor'
        );

        Paginator::useBootstrap();

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $theme = ThemeManager::getActiveTheme();

        $this->loadViewsFrom(
            base_path("platform/themes/{$theme}/views"),
            'theme'
        );

        // --- DASHBOARD MENU ---
        dashboard_menu([
            'id' => 'dashboard',
            'name' => 'Dashboard',
            'icon' => 'fas fa-chart-pie', // Thay từ tachometer-alt sang biểu đồ hiện đại hơn
            'url' => '/admin',
            'permission' => 'core.system',
        ]);

        $customerRole = Role::where('slug', 'customer')->exists();

        if ($customerRole) {
            dashboard_menu([
                'id' => 'members',
                'name' => 'Member',
                'icon' => 'fas fa-id-card',
                'url' => '/admin/members',
                'permission' => 'users.view',
            ]);
        }

        dashboard_menu([
            'id' => 'system',
            'name' => 'System',
            'icon' => 'fas fa-sliders-h', // Thay cogs thành thanh gạt (Sliders) đại diện cho cấu hình hệ thống
            'permission' => 'core.system',
            'children' => [
                [
                    'name' => 'Menu Builder',
                    'url' => '/admin/menus',
                    'icon' => 'fas fa-stream', // Thay bars (3 gạch) thành stream (dạng phân cấp cây menu)
                    'permission' => 'core.system',
                ],
                [
                    'name' => 'Users',
                    'url' => '/admin/users',
                    'icon' => 'fas fa-user-shield', // Thay users thành user-shield (người dùng quản trị)
                    'permission' => 'core.system',
                ],
                [
                    'name' => 'Roles',
                    'url' => '/admin/roles',
                    'icon' => 'fas fa-user-tag', // Thay users thành user-tag để thể hiện việc gán vai trò/nhãn
                    'permission' => 'core.system',
                ],
            ],
        ]);

        dashboard_menu([
            'id' => 'themes',
            'name' => 'Themes',
            'icon' => 'fas fa-palette', // Thay paint-brush thành bảng màu (Palette) thiết kế hiện đại
            'url' => '/admin/themes',
            'permission' => 'core.system',
        ]);
        dashboard_menu([
            'id' => 'pages',
            'name' => 'Pages',
            'icon' => 'fas fa-file-alt',
            'url' => '/admin/pages',
            'permission' => 'pages.view',
        ]);
    }
}

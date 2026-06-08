<?php

namespace Platform\Plugins\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Platform\Plugins\Blog\Models\Category;
use Platform\Plugins\Blog\Models\Post;

class BlogServiceProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'blog');

        dashboard_menu([
            'name' => 'Blog',
            'icon' => 'fas fa-blog',
            'permission' => 'core.system',
            'children' => [
                [
                    'name' => 'Posts',
                    'url' => '/admin/blog/posts',
                    'icon' => 'far fa-circle',
                    'permission' => 'blog.posts.view',
                ],
                [
                    'name' => 'Categories',
                    'url' => '/admin/blog/categories',
                    'icon' => 'far fa-circle',
                    'permission' => 'blog.categories.view',
                ],
                [
                    'name' => 'Tags',
                    'url' => '/admin/blog/tags',
                    'icon' => 'far fa-circle',
                    'permission' => 'blog.tags.view',
                ],
            ],
        ]);
        dashboard_widget([
            'title' => 'Posts',
            'value' => Post::count(),
            'icon' => 'newspaper'
        ]);
        dashboard_widget([
            'title' => 'Categories',
            'value' => Category::count(),
            'icon' => 'folder',
        ]);
    }
}

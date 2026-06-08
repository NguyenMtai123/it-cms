<?php

use Platform\Core\Base\Helpers\BaseHelper;
use Platform\Core\Base\Helpers\Setting;
use Platform\Core\Base\Menu\DashboardMenu;
use Platform\Core\Base\Support\MenuBuilder;

if (!function_exists('base_path_module')) {
    function base_path_module(string $module = '')
    {
        return BaseHelper::base_path_module($module);
    }
}

if (!function_exists('admin_url')) {
    function admin_url(string $path = '')
    {
        return BaseHelper::admin_url($path);
    }
}

if (!function_exists('dashboard_menu')) {
    function dashboard_menu(array $item)
    {
        DashboardMenu::add($item);
    }
}
if (!function_exists('setting')) {

    function setting(
        string $key,
        mixed $default = null
    ): mixed {

        return Setting::get(
            $key,
            $default
        );
    }
}
if (!function_exists('theme_menu')) {
    function theme_menu(string $location = 'main'): array
    {
        return MenuBuilder::get($location);
    }
}
if (!function_exists('theme_asset')) {
    function theme_asset($path)
    {
        return \Platform\Core\Base\Support\ThemeHelper::asset($path);
    }
}

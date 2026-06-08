<?php

use Platform\Core\Dashboard\Widgets\WidgetManager;

if (!function_exists('dashboard_widget')) {
    function dashboard_widget(array $widget)
    {
        WidgetManager::register($widget);
    }
}

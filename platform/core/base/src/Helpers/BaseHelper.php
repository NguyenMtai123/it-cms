<?php

namespace Platform\Core\Base\Helpers;

class BaseHelper
{
    /**
     * Lấy đường dẫn module
     */
    public static function base_path_module(string $module = ''): string
    {
        return base_path('platform/core/' . $module);
    }

    /**
     * URL admin cơ bản
     */
    public static function admin_url(string $path = ''): string
    {
        return url('/admin/' . ltrim($path, '/'));
    }
}

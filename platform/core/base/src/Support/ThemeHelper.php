<?php

namespace Platform\Core\Base\Support;

class ThemeHelper
{
    public static function asset(string $path): string
    {
        $theme = ThemeManager::getActiveTheme();

        return asset("platform/themes/{$theme}/assets/{$path}");
    }
}

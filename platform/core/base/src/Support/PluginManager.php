<?php

namespace Platform\Core\Base\Support;

use Platform\Core\Base\Models\Plugin;

class PluginManager
{
    public static function load(): void
    {
        $plugins = Plugin::where('is_active', 1)->get();

        foreach ($plugins as $plugin) {

            if (!$plugin->provider) {
                continue;
            }

            if (!class_exists($plugin->provider)) {
                continue;
            }

            app()->register($plugin->provider);
        }
    }
}

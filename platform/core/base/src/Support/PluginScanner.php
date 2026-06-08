<?php

namespace Platform\Core\Base\Support;

use Platform\Core\Base\Models\Plugin;

class PluginScanner
{
    /**
     * Quét toàn bộ plugins trong folder
     */
    public static function scan(): void
    {
        $path = base_path('platform/plugins');

        $folders = glob($path . '/*', GLOB_ONLYDIR);

        foreach ($folders as $folder) {
            $jsonPath = $folder . '/plugin.json';

            if (!file_exists($jsonPath)) {
                continue;
            }

            $json = json_decode(file_get_contents($jsonPath), true);

            if (!$json || empty($json['slug'])) {
                continue;
            }

            $plugin = Plugin::firstOrNew([
                'slug' => $json['slug'],
            ]);

            $plugin->name = $json['name'] ?? $json['slug'];
            $plugin->provider = $json['provider'] ?? null;

            if (!$plugin->exists) {
                $plugin->is_installed = 0;
                $plugin->is_active = 0;
            }

            $plugin->save();
        }
    }
}

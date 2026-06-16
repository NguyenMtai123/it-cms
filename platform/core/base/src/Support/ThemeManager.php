<?php

namespace Platform\Core\Base\Support;

class ThemeManager
{
    protected static function configFile(): string
    {
        return storage_path('app/theme.json');
    }

    public static function getActiveTheme(): string
    {
        $file = self::configFile();

        if (! file_exists($file)) {
            return 'default';
        }

        $data = json_decode(
            file_get_contents($file),
            true
        );

        return $data['active'] ?? 'default';
    }

    public static function setActiveTheme(string $theme): void
    {
        file_put_contents(
            self::configFile(),
            json_encode([
                'active' => $theme
            ], JSON_PRETTY_PRINT)
        );
    }

    public static function getThemes()
    {
        $active = self::getActiveTheme();

        return collect(
            glob(base_path('platform/themes/*'))
        )
        ->filter(fn ($path) => is_dir($path))
        ->map(function ($path) use ($active) {

            $slug = basename($path);

            return (object) [
                'name' => ucfirst($slug),
                'slug' => $slug,
                'is_active' => $slug === $active,
            ];
        })
        ->values();
    }
}

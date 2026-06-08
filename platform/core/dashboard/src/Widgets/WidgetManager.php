<?php

namespace Platform\Core\Dashboard\Widgets;

class WidgetManager
{
    protected static array $widgets = [];

    public static function register(array $widget): void
    {
        self::$widgets[] = $widget;
    }

    public static function all(): array
    {
        return self::$widgets;
    }

    public static function reset(): void
    {
        self::$widgets = [];
    }
}

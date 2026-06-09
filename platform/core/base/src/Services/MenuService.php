<?php

namespace Platform\Core\Base\Services;

use Platform\Core\Base\Models\Menu;

class MenuService
{
    public static function getByLocation(string $location): ?Menu
    {
        return Menu::with(['items.children'])
            ->where('location', $location)
            ->where('is_active', true)
            ->first();
    }
}

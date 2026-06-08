<?php

namespace Platform\Core\Base\Support;

use Platform\Core\Base\Models\Menu;
use Platform\Core\Base\Models\MenuItem;

class MenuBuilder
{
    public static function get(string $location = 'main'): array
    {
        $menu = Menu::query()
            ->where('location', $location)
            ->where('is_active', 1)
            ->first();

        if (! $menu) {
            return [];
        }

        $items = MenuItem::query()
            ->where('menu_id', $menu->id)
            ->where('parent_id', 0)
            ->where('is_active', 1)
            ->orderBy('order')
            ->get();

        return self::buildTree($items);
    }

    protected static function buildTree($items): array
    {
        $result = [];

        foreach ($items as $item) {
            $children = MenuItem::query()
                ->where('parent_id', $item->id)
                ->where('is_active', 1)
                ->orderBy('order')
                ->get();

            $result[] = [
                'id' => $item->id,
                'label' => $item->label,
                'type' => $item->type,
                'url' => self::resolveUrl($item),
                'target_blank' => $item->target_blank,
                'children' => self::buildTree($children),
            ];
        }

        return $result;
    }

    protected static function resolveUrl(MenuItem $item): string
    {
        if ($item->type === 'custom') {
            return $item->url ?: '#';
        }

        if ($item->route_name) {
            return route($item->route_name, $item->route_params ?? []);
        }

        return $item->url ?: '#';
    }
}

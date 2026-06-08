<?php

namespace Platform\Core\Base\Menu;

use Platform\Core\ACL\Support\PermissionChecker;

class DashboardMenu
{
    protected static array $items = [];

    public static function add(array $item): void
    {
        self::$items[] = $item;
    }

    public static function get(): array
    {
        $user = auth()->user();

                if (!app()->runningInConsole() && !auth()->check()) {
            return self::$items; // KHÔNG return rỗng
        }

        if ($user->super_user) {
            return self::$items;
        }

        $items = array_map(function ($item) {
            if (!self::checkItem($item)) {
                return null;
            }

            if (!empty($item['children'])) {
                $item['children'] = array_values(array_filter(
                    $item['children'],
                    fn ($child) => self::checkItem($child)
                ));
            }

            return $item;
        }, self::$items);

        return array_values(array_filter($items));
    }

    protected static function checkItem(array $item): bool
    {
        // nếu không có permission → luôn hiển thị
        if (!isset($item['permission'])) {
            return true;
        }

        return PermissionChecker::has($item['permission']);
    }
}

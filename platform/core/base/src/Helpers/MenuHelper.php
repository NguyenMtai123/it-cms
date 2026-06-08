<?php

namespace Platform\Core\Base\Helpers;

class MenuHelper
{
    public static function isActive(string $url): bool
    {
        return request()->is(trim($url, '/'));
    }

    public static function isParentActive(array $children): bool
    {
        foreach ($children as $child) {
            if (self::isActive($child['url'] ?? '')) {
                return true;
            }
        }

        return false;
    }
}

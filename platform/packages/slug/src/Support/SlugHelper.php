<?php

namespace Platform\Packages\Slug\Support;

use Illuminate\Support\Str;

class SlugHelper
{
    public static function make(
        string $title,
        string $modelClass,
        ?int $ignoreId = null,
        string $column = 'slug'
    ): string {

        // 1. chuẩn hóa tiếng Việt
        $title = mb_strtolower($title, 'UTF-8');

        $base = Str::ascii($title); // chuyển "Liên hệ" → "Lien he"
        $base = Str::slug($base, '-');

        if ($base === '') {
            $base = 'page';
        }

        $slug = $base;
        $i = 2;

        while (self::exists($modelClass, $column, $slug, $ignoreId)) {
            $slug = $base . '-' . $i;
            $i++;
        }

        return $slug;
    }

    protected static function exists(
        string $modelClass,
        string $column,
        string $slug,
        ?int $ignoreId = null
    ): bool {
        $query = $modelClass::query()->where($column, $slug);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->exists();
    }
}

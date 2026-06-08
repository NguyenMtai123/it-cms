<?php

namespace Platform\Core\Base\Support;

use Illuminate\Support\Facades\DB;

class ThemeManager
{
    public static function getActiveTheme(): string
    {
        return DB::table('themes')
            ->where('is_active', 1)
            ->value('slug') ?? 'default';
    }
}

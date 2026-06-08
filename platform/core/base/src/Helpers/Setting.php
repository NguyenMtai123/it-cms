<?php

namespace Platform\Core\Base\Helpers;

use Platform\Core\Base\Models\Setting as SettingModel;

class Setting
{
    public static function get(
        string $key,
        mixed $default = null
    ): mixed {

        return SettingModel::where('key', $key)
            ->value('value') ?? $default;
    }

    public static function set(
        string $key,
        mixed $value
    ): void {

        SettingModel::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}

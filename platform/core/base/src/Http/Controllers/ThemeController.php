<?php

namespace Platform\Core\Base\Http\Controllers;

use Platform\Core\Base\Support\ThemeManager;

class ThemeController
{
    public function index()
    {
        $themes = ThemeManager::getThemes();

        return view(
            'base::themes.index',
            compact('themes')
        );
    }

    public function activate(string $slug)
    {
        $themePath = base_path(
            "platform/themes/{$slug}"
        );

        if (! is_dir($themePath)) {
            abort(404);
        }

        ThemeManager::setActiveTheme($slug);

        return back()->with(
            'success',
            'Theme activated!'
        );
    }
}

<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ThemeController
{
    public function index()
    {
        $themes = DB::table('themes')->get();

        return view('base::themes.index', compact('themes'));
    }

    public function activate($slug)
    {
        // 1. tắt hết theme
        DB::table('themes')->update([
            'is_active' => 0
        ]);

        // 2. bật theme được chọn
        DB::table('themes')
            ->where('slug', $slug)
            ->update([
                'is_active' => 1
            ]);

        return back()->with('success', 'Theme activated!');
    }
}

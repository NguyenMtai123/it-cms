<?php

namespace Platform\Core\Base\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Core\Base\Helpers\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        return view('base::settings.index');
    }

    public function save(Request $request)
    {
        Setting::set(
            'site_title',
            $request->site_title
        );

        Setting::set(
            'site_description',
            $request->site_description
        );

        Setting::set(
            'admin_email',
            $request->admin_email
        );

        Setting::set(
            'site_logo',
            $request->site_logo
        );

        Setting::set(
            'site_favicon',
            $request->site_favicon
        );

        return back()->with(
            'success',
            'Settings saved'
        );
    }
}

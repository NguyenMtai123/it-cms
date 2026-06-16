<?php

namespace Platform\Plugins\Footer\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Plugins\Footer\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
    public function index()
    {
        $setting = FooterSetting::first();

        return view(
            'footer::setting',
            compact('setting')
        );
    }

    public function save(Request $request)
    {
        FooterSetting::updateOrCreate(

            ['id' => 1],

            [

                'name' => $request->name,
                'rector' => $request->rector,
                'description' => $request->description,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'website' => $request->website,
                'logo' => $request->logo,

            ]

        );

        return redirect()
            ->back()
            ->with('success', 'Saved');
    }
}

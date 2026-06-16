<?php

namespace Platform\Plugins\Admission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Plugins\Admission\Models\AdmissionSetting;

class AdmissionSettingController extends Controller
{
    public function index()
    {
        $setting = AdmissionSetting::first();

        if (!$setting) {

            $setting = AdmissionSetting::create([
                'title' => 'Thông tin tuyển sinh',
            ]);
        }

        return view(
            'admission::admin.settings',
            compact('setting')
        );
    }

    public function update(Request $request)
    {
        $setting = AdmissionSetting::firstOrFail();

        $setting->update([
            'title' => $request->title,

            'banner_image' => $request->banner_image,
            'banner_url' => $request->banner_url,

            'career_image' => $request->career_image,
            'career_url' => $request->career_url,

            'background_image' => $request->background_image,
        ]);

        return back()->with(
            'success',
            'Updated successfully'
        );
    }
}

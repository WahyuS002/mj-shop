<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings.siteName' => 'required|min:4|max:255',
            'settings.siteDescription' => 'nullable|min:4|max:1024',
            'settings.contactEmail' => 'nullable|email|min:12|max:255',
            'settings.contactPhoneNumber' => 'nullable|min:9|max:32',
            'settings.storeAddress' => 'nullable|min:10|max:1024',
            'logo' => 'nullable|mimes:jpg,jpeg,png,svg|max:5096',
            'icon' => 'nullable|mimes:jpg,jpeg,png,svg|max:2048'
        ]);

        foreach ($request->settings as $key => $value) {
            updateSetting($key, $value);
        }

        if ($request->has('logo') && $request->file('logo')->isValid()) {
            $logo = Setting::where('key', 'siteLogo')->first();
            if (isset($logo->media[0])) {
                $logo->media[0]->delete();
            }

            $logo->addMediaFromRequest('logo')
                ->toMediaCollection('site_logo');
        }

        if ($request->has('icon') && $request->file('icon')->isValid()) {
            $icon = Setting::where('key', 'siteIcon')->first();
            if (isset($icon->media[0])) {
                $icon->media[0]->delete();
            }

            $icon->addMediaFromRequest('icon')
                ->toMediaCollection('site_icon');
        }

        return redirect()
            ->back()
            ->withSuccess('Berhasil memperbarui pengaturan');
    }
}

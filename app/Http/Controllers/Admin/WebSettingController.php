<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    /**
     * Display the web settings form (only 1 row)
     */
    public function index()
    {
        $setting = WebSetting::getSettings();
        return view('admin.web-settings.index', compact('setting'));
    }

    /**
     * Update the web settings
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'video_url' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $setting = WebSetting::first();
        if ($setting) {
            $setting->update($validated);
        } else {
            WebSetting::create($validated);
        }

        return redirect()->back()->with('success', 'Pengaturan web berhasil diperbarui');
    }
}

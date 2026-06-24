<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Get the first setting row, or create an empty one if it doesn't exist
        $setting = Setting::firstOrCreate(
            ['id' => 1],
            [
                'website_name' => 'Arini Furniture',
                'address' => 'Trade Centre, Udhana Darwaja',
                'phone' => '(844)555-8386',
                'email' => 'demo@harvest.com',
                'copyright_text' => 'Furnicom HTML © 2019 Demo Store. All Rights Reserved.'
            ]
        );

        return view('adminpage.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();
        }

        $request->validate([
            'website_name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'copyright_text' => 'nullable|string',
            'app_download_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except(['app_download_image']);

        if ($request->hasFile('app_download_image')) {
            if ($setting->app_download_image) {
                Storage::disk('public')->delete($setting->app_download_image);
            }
            $data['app_download_image'] = $request->file('app_download_image')->store('assets/settings', 'public');
        }

        $setting->update($data);

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan website berhasil diperbarui!');
    }
}

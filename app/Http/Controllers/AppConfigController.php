<?php

namespace App\Http\Controllers;

use App\Models\AppConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class AppConfigController extends Controller
{
    public function index()
    {
        return view('pages.app-config');
    }

    public function getConfigs()
    {
        $config = AppConfig::first();
        if (!$config) {
            $config = AppConfig::create([
                'instansi_name' => 'Kiosk Antrian',
                'instansi_address' => null,
                'instansi_phone' => null,
                'instansi_email' => null,
                'logo' => null,
                'active_theme' => 'default',
                'footer_text' => null,
                'social_media_facebook' => null,
                'social_media_instagram' => null,
                'social_media_twitter' => null
            ]);
        }
        return response()->json($config);
    }

    public function update(Request $request)
    {
        $config = AppConfig::first();
        
        if (!$config) {
            $config = AppConfig::create($request->all());
        } else {
            $config->update($request->all());
        }

        Cache::forget('app_config');
        return response()->json($config);
    }

    public function uploadLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $config = AppConfig::first();
        
        // Delete old logo if exists
        if ($config && $config->logo) {
            Storage::disk('public')->delete($config->logo);
        }

        $path = $request->file('logo')->store('logos', 'public');
        
        if ($config) {
            $config->update(['logo' => $path]);
        } else {
            $config = AppConfig::create(['logo' => $path]);
        }

        Cache::forget('app_config');
        return response()->json([
            'logo' => $path,
            'logo_url' => Storage::url($path)
        ]);
    }

    public function deleteLogo()
    {
        $config = AppConfig::first();
        
        if ($config && $config->logo) {
            Storage::disk('public')->delete($config->logo);
            $config->update(['logo' => null]);
        }

        Cache::forget('app_config');
        return response()->json(null, 204);
    }
}

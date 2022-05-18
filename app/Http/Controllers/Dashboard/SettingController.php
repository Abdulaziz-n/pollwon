<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\SettingsRequest;
use App\Http\Resources\Settings\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        return SettingResource::collection(Setting::all())->all();
    }

    public function update(Setting $setting, SettingsRequest $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(new SettingResource($setting));
        }
        if ($request->hasFile('file')) {
            File::delete($setting->file);
            $file = $request->file('file')->store('file');
        } else $file = $setting->file;
        if ($request->hasFile('file_agreement')) {
            File::delete($setting->file_agreement);
            $file_agreement = $request->file('file_agreement')->store('file');
        } else $file_agreement = $setting->file_agreement;

        $setting->update([
            'shop' => $request->shop,
            'office' => $request->office,
            'social' => $request->social,
            'main_title' => $request->main_title,
            'about_us' => $request->about_us,
            'file' => $file,
            'file_agreement' => $file_agreement
        ]);
        return new SettingResource($setting);
    }
}

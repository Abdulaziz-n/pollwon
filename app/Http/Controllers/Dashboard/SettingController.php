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

        $setting->update([
            'shop' => $request->shop,
            'office' => $request->office,
            'social' => $request->social,
            'link' => $request->link,
            'file' => $file
        ]);
        return response()->json(new SettingResource($setting), 201);
    }
}

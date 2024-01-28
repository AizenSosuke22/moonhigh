<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function index()
    {
        $jsonFilePath = public_path('custom.json');

        if (File::exists($jsonFilePath)){
            $data = json_decode(File::get($jsonFilePath), true);
            return view('admin.settings.create', compact('data'));
        } else {
            abort(404);
        }
    }

    public function social(Request $request)
    {
        $jsonFilePath = public_path('custom.json');

        if (File::exists($jsonFilePath)) {
            $data = json_decode(File::get($jsonFilePath), true);

            $data['facebook'] = $request->facebook;
            $data['instagram'] = $request->instagram;
            $data['tiktok'] = $request->tiktok;
            $data['whatsapp'] = $request->whatsapp;
            $data['snapchat'] = $request->snapchat;
            $data['maps'] = $request->maps;

            File::put($jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));

            return back()->with('success', 'تم تحديث معلومات الاتصال بنجاح');
        } else {
            abort(404);
        }
    }
}

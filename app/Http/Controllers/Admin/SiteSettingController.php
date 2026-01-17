<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Http\Requests\SiteSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class SiteSettingController extends Controller
{

    public function index()
    {
        // $siteSettings = app('view')->getShared()['siteSettings'];
        // dd($siteSettings['site_name']);

        return view('back.site_setting.index');
    }
    public function edit(SiteSettingRequest $request)
    {
        $siteSettings = [];

        foreach ($request->except('_token') as $key => $value) {
            $siteSettings[] = ['key' => $key, 'value' => $value];
        }

        SiteSetting::truncate();

        foreach ($siteSettings as $setting) {
            SiteSetting::create([
                'key' => $setting['key'],
                'value' => $setting['value']
            ]);
        }

        Cache::forget('site_settings');

        toast('Cập nhật thành công!', 'success');
        return back()->with('success', 'Cập nhật thành công.');
    }
    public function email_config()
    {
        //    $txt = File::get(storage_path('mail_config.txt'));
        //    foreach(file($txt) as $value){
        //     echo $value;
        //    }
        //    dd();
        // $mail_config = config('mail.mailers.smtp');
        // dd($mail_config);

        // return view('back.site_setting.email-config', compact('mail_config'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
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
    public function edit(Request $request)
    {

        $this->validate($request, [
            'site_name' => 'nullable | max: 10',
            'site_title' => 'nullable',
            // 'site_keywords' => 'nullable',
            'site_icon' => 'nullable',
            'site_email' => 'nullable | email',
            'site_phone' => 'nullable | numeric',
            'site_address' => 'nullable',
            'site_link_facebook' => 'nullable',
            'site_link_youtube' => 'nullable',
            'site_link_instagram' => 'nullable',
            'site_description' => 'nullable | max: 500',
        ]);

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

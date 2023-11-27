<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteSettingController extends Controller
{
    public function index()
    {
        $site_setting = SiteSetting::first();
        return view('back.site_setting.index', compact('site_setting'));
    }
    public function edit(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'site_name' => 'required | max: 10',
            'site_title' => 'required',
            'site_keywords' => 'required',
            'site_icon' => 'required',
            'site_email' => 'required | email',
            'site_phone' => 'required | numeric',
            'site_address' => 'required',
            'site_link_facebook' => 'required',
            'site_link_youtube' => 'required',
            'site_link_instagram' => 'required',
            'site_description' => 'required | max: 500',
        ]);

        if($request->id != null){
            SiteSetting::where('id', '>', '0')->update([
                'site_name' => $request->site_name,
                'site_title' => $request->site_title,
                'site_keywords' => $request->site_keywords,
                'site_icon' => $request->site_icon,
                'site_email' => $request->site_email,
                'site_phone' => $request->site_phone,
                'site_address' => $request->site_address,
                'site_link_facebook' => $request->site_link_facebook,
                'site_link_youtube' => $request->site_link_youtube,
                'site_link_instagram' => $request->site_link_instagram,
                'site_description' => $request->site_description,
            ]);

        }else{
            SiteSetting::create([
                'site_name' => $request->site_name,
                'site_title' => $request->site_title,
                'site_keywords' => $request->site_keywords,
                'site_icon' => $request->site_icon,
                'site_email' => $request->site_email,
                'site_phone' => $request->site_phone,
                'site_address' => $request->site_address,
                'site_link_facebook' => $request->site_link_facebook,
                'site_link_youtube' => $request->site_link_youtube,
                'site_link_instagram' => $request->site_link_instagram,
                'site_description' => $request->site_description,
            ]);
        }
        
        toast('Cập nhật thành công!','success');
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

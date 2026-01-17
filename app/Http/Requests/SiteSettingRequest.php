<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'site_name'           => 'nullable|max:10',
            'site_title'          => 'nullable',
            'site_icon'           => 'nullable',
            'site_email'          => 'nullable|email',
            'site_phone'          => 'nullable|numeric',
            'site_address'        => 'nullable',
            'site_link_facebook'  => 'nullable',
            'site_link_youtube'   => 'nullable',
            'site_link_instagram' => 'nullable',
            'site_description'    => 'nullable|max:500',
        ];
    }
}

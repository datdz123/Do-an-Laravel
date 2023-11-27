<?php

namespace App\Helpers;

use App\Models\SiteSetting;
use Illuminate\Foundation\Application;

class websiteInformationHelper
{
    public $site_name = '';
    public $site_title = '';
    public $site_keywords = '';
    public $site_icon = '';
    public $site_email = '';
    public $site_phone = '';
    public $site_address = '';
    public $site_link_facebook = '';
    public $site_link_youtube = '';
    public $site_link_instagram = '';
    public $site_description = '';


    public function __construct()
    {
        $this->site_name = $this->websiteInformation()['site_name'];
        $this->site_title = $this->websiteInformation()['site_title'];
        $this->site_keywords = $this->websiteInformation()['site_keywords'];
        $this->site_icon = $this->websiteInformation()['site_icon'];
        $this->site_email = $this->websiteInformation()['site_email'];  
        $this->site_phone = $this->websiteInformation()['site_phone'];  
        $this->site_address = $this->websiteInformation()['site_address'];  
        $this->site_link_facebook = $this->websiteInformation()['site_link_facebook'];  
        $this->site_link_youtube = $this->websiteInformation()['site_link_youtube'];  
        $this->site_link_instagram = $this->websiteInformation()['site_link_instagram']; 
        $this->site_description = $this->websiteInformation()['site_description'];  
    }

    public static function websiteInformation()
    {
        $null = 'Lrv v '. Application::VERSION;
        $get_site = SiteSetting::first();

        $site = [
            'site_name' => isset($get_site->site_name) ? $get_site->site_name : $null,
            'site_title' => isset($get_site->site_title) ? $get_site->site_title : $null,
            'site_keywords' => isset($get_site->site_keywords) ? $get_site->site_keywords : $null,
            'site_icon' => isset($get_site->site_icon) ? $get_site->site_icon : $null,
            'site_email' => isset($get_site->site_email) ? $get_site->site_email : $null,
            'site_phone' => isset($get_site->site_phone) ? $get_site->site_phone : $null,
            'site_address' => isset($get_site->site_address) ? $get_site->site_address : $null,
            'site_link_facebook' => isset($get_site->site_link_facebook) ? $get_site->site_link_facebook : $null,
            'site_link_youtube' => isset($get_site->site_link_youtube) ? $get_site->site_link_youtube : $null,
            'site_link_instagram' => isset($get_site->site_link_instagram) ? $get_site->site_link_instagram : $null,
            'site_description' => isset($get_site->site_description) ? $get_site->site_description : $null,
        ];

        return $site;
    }
}

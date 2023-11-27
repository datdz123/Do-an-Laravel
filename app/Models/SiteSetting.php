<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $table = 'site_setting';
    protected $primarykey = 'id';
    protected $quarded = [];
    protected $fillable = [
        'site_name',
        'site_title',
        'site_keywords',
        'site_icon',
        'site_email',
        'site_phone',
        'site_address',
        'site_link_facebook',
        'site_link_youtube',
        'site_link_instagram',
        'site_description',
    ];
}

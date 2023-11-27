<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $primarykey = 'id';
    protected $quarded = [];
    protected $fillable = [
        'title',
        'content',
        'link',
        'images',
        'size',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    protected $primarykey = 'id';
    protected $quarded = [];

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
    public function child()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }
}

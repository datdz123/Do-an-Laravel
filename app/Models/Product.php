<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primarykey = 'id';
    protected $quarded = [];
    protected $fillable = [
        'name',
        'slug',
        'brand_id',
        'product_category_id',
        'description',
        'images',
        'content',
        'price',
        'size',
        'qty',
        'discount',
        'status'
    ];

    // public function brand()
    // {
    //     return $this->belongsTo(Brand::class, 'brand_id', 'id');
    // }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    // public function productImage(){
    //     return $this->hasMany(ProductImage::class ,'product_id','id');
    // }
    // public function productDetails(){
    //     return $this->hasMany(ProductDetail::class ,'product_id','id');
    // }
    public function productComments()
    {
        return $this->hasMany(ProductComment::class, 'product_id', 'id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }
    // //tìm kiếm
    // public function scopeSearch($query)
    // {
    //     if ($search = request()->search) {
    //         $query = $query->where('name', 'like', '%' . $search . '%');
    //     }
    //     return $query;
    // }
}

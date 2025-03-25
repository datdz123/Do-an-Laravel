<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
    }
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function getAllChildIds()
    {
        $ids = collect([$this->id]);
        $this->allChildren->each(function ($child) use ($ids) {
            $ids->push($child->id);
            if ($child->allChildren) {
                $ids->push(...$child->getAllChildIds());
            }
        });
        return $ids;
    }
}

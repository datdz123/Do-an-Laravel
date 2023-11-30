<?php

namespace App\Helpers;

use App\Models\Product;

class showCategoriesHelper
{

    public function __construct()
    {
    }
    public static function showCategoriesOptions($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id) {
                // Xử lý hiển thị chuyên mục
                if ($item->parent_id == 0) {
                    echo ' <option disabled >' . $item->name . '</option>';
                } else {
                    # code...
                    echo ' <option value=" ' . $item->id . '">' . $char . $item->name . '</option>';
                }
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                self::showCategoriesOptions($categories, $item['id'], $char . '|--- ');
            }
        }
    }
    public static function showSelectedCategoryOptions($categories, $product, $parent_id = 0, $char = '')
    {
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['parent_id'] == $parent_id) {
                // Xử lý hiển thị chuyên mục
                if ($item->parent_id == 0) {
                    echo ' <option disabled >' . $item->name . '</option>';
                } elseif ($item->id == $product) {
                    echo ' <option selected value=" ' . $item->id . '">' . $char . $item->name . '</option>';
                } else {
                    # code...
                    echo ' <option value=" ' . $item->id . '">' . $char . $item->name . '</option>';
                }
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                self::showSelectedCategoryOptions($categories, $product, $item['id'], $char . '|--- ');
            }
        }
    }

    public static function showCategories($categories, $parent_id = 0, $char = '')
    {
        foreach ($categories as $key => $item) {
            // Nếu là chuyên mục con thì hiển thị

            //count
            $countProducts = Product::join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                ->select('products.*', 'product_categories.parent_id')
                ->where('product_categories.parent_id', $item->id)
                ->where('status', 'active')
                ->count();

            $countSubcategory =  Product::join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                ->select('products.*', 'product_categories.parent_id')
                ->where('product_categories.id', $item->id)
                ->where('status', 'active')
                ->count();

            $checked = request('id') == $item->id ? 'checked' : '';
            if ($item['parent_id'] == $parent_id) {
                // Xử lý hiển thị chuyên mục
                if ($item->parent_id == 0) {
                    echo ' <form method="GET" action="' .
                        route('shop/category', ['id' => $item->id, 'slug' => $item->slug]) .
                        '">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input ' .
                        $checked .
                        '   onclick="this.form.submit()"  type="checkbox" class="custom-control-input" value="' .
                        $item->id .
                        '"  id="idd' .
                        $key .
                        '">
                    <label class="custom-control-label"  for="idd' .
                        $key .
                        '"> ' .
                        $item->name .
                        '</label>
                    <span class="badge border font-weight-normal">' .
                        $countProducts .
                        '</span></div></form>';
                } else {
                    echo '<form method="GET" action="' .
                        route('shop/category', ['id' => $item->id, 'slug' => $item->slug]) .
                        '">
                         <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                         <input ' .
                        $checked .
                        ' onclick="this.form.submit()" type="checkbox" class="custom-control-input" value="' .
                        $item->id .
                        '"  id="id' .
                        $key .
                        '">
                    <label class="custom-control-label" for="id' .
                        $key .
                        '">' .
                        $char .
                        $item->name .
                        '</label>
                    <span class="badge border font-weight-normal">' .
                        $countSubcategory .
                        '</span></div></form>';
                }
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                self::showCategories($categories, $item['id'], $char . '|--- ');
            }
        }
    }


}

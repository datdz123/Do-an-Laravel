<?php

namespace App\Helpers;

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
}

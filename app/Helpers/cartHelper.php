<?php

namespace App\Helpers;

use App\Models\Product;

class cartHelper
{

    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }

    // public function add($product_id, $size = '', $qty = 1)
    // {

    //     $product = Product::findOrFail($product_id);
    //     $items = [
    //         'product_id' => $product_id,
    //         'size' => $size,
    //         'price' => $product->discount ? $product->discount : $product->price,
    //         'qty'  => $qty,

    //     ];

    //     $proQty = $product->qty;


    //     if ($this->items != []) {
    //         $i = count($this->items) - 1;
    //         foreach ($this->items as $key => $value) :

    //             if ($value['product_id'] == $items['product_id']) {
    //                 if ($value['size'] == $items['size']) {
    //                     $this->items[$key]['qty'] += $qty;
    //                     break;
    //                 } else {
    //                     if ($i == $key) {
    //                         $this->items[] = $items;
    //                         break;
    //                     } else {
    //                         continue;
    //                     }
    //                 }
    //             } else {
    //                 if ($i == $key) {
    //                     $this->items[] = $items;
    //                     break;
    //                 }
    //             }
    //         endforeach;
    //     } else {
    //         $this->items[] = $items;
    //     }


    //     session(['cart' => $this->items]);
    // }
    // public function remove($id)
    // {
    //     if (isset($this->items[$id])) {
    //         unset($this->items[$id]);
    //     }
    //     session(['cart' => $this->items]);
    // }
    // public function update($id, $qty = 1)
    // {

    //     if (isset($this->items[$id])) {

    //         $this->items[$id]['qty'] = $qty;

    //         toast('Giỏ hàng đã được cập nhật!', 'success');
    //     }
    //     session(['cart' => $this->items]);
    // }
    // public function clear()
    // {
    //     session(['cart' => []]);
    // }
    // public function get_total_price()
    // {
    //     $t = 0;
    //     foreach ($this->items as $key => $value) {
    //         $t += $value['price'] * $value['qty'];
    //     }
    //     return $t;
    // }
    // public function get_total_quantity()
    // {
    //     $t = 0;
    //     foreach ($this->items as $key => $value) {
    //         $t += $value['qty'];
    //     }
    //     return $t;
    // }

    /**
     * Cách 2.
     */

    public function add($product_id, $size = '', $qty = 1)
    {
        $product = Product::findOrFail($product_id);
        $price = $product->discount ? $product->discount : $product->price;

        $itemKey = $this->findItemKey($product_id, $size);
        if ($itemKey !== false) {
            $this->items[$itemKey]['qty'] += $qty;
        } else {
            $this->items[] = [
                'product_id' => $product_id,
                'size' => $size,
                'price' => $price,
                'qty' => $qty,
            ];
        }

        session(['cart' => $this->items]);
    }

    private function findItemKey($product_id, $size)
    {
        foreach ($this->items as $key => $item) {
            if ($item['product_id'] == $product_id && $item['size'] == $size) {
                return $key;
            }
        }
        return false;
    }

    public function remove($id)
    {
        if (array_key_exists($id, $this->items)) {
            unset($this->items[$id]);
            session(['cart' => $this->items]);
        }
    }

    public function update($id, $qty = 1)
    {
        if (array_key_exists($id, $this->items)) {
            $this->items[$id]['qty'] = $qty;
            session(['cart' => $this->items]);
        }
    }

    public function clear()
    {
        session(['cart' => []]);
    }

    public function get_total_price()
    {
        return array_reduce($this->items, function ($total, $item) {
            return $total + ($item['price'] * $item['qty']);
        }, 0);
    }

    public function get_total_quantity()
    {
        return array_reduce($this->items, function ($total, $item) {
            return $total + $item['qty'];
        }, 0);
    }


}




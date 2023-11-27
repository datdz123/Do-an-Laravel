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

    public function add($product_id, $size = '', $qty = 1)
    {

        $product = Product::findOrFail($product_id);
        $items = [
            'product_id' => $product_id,
            'size' => $size,
            'price' => $product->discount ? $product->discount : $product->price,
            'qty'  => $qty,

        ];

        $proQty = $product->qty;
        // if($qty > $inventory){
        //     alert('Thất bại', 'Số lượng trong giỏ hàng không thể lớn hơn số lượng trong kho!', 'warning');
        //     return;
        // }
        //     $s = '';
        // foreach (session('cart') as $i => $value) {
        //     $s += ' '. $value;
        // }
        // $valueSize = explode(' ', $s);
        // dd($valueSize);

        if ($this->items != []) {
            $i = count($this->items) - 1;
            foreach ($this->items as $key => $value) :

                if ($value['product_id'] == $items['product_id']) {
                    if ($value['size'] == $items['size']) {
                        $this->items[$key]['qty'] += $qty;
                        break;
                    } else {
                        if ($i == $key) {
                            $this->items[] = $items;
                            break;
                        } else {
                            continue;
                        }
                    }
                } else {
                    if ($i == $key) {
                        $this->items[] = $items;
                        break;
                    }
                }
            endforeach;
        } else {
            $this->items[] = $items;
        }
        // if (
        //     isset($this->items[$product_id])
        // ) {
        // if ($this->items[$product_id]['size'] ==  $size_comparison) {
        // $this->items[$product_id]['size'] = $items['size'];
        // $this->items[$product_id]['qty'] += $qty;
        // if ($this->items[$product_id]['qty'] > $inventory) {
        //     alert('Thất bại', 'Số lượng trong giỏ hàng không thể lớn hơn số lượng trong kho!', 'warning');
        //     return;
        // }
        // alert('Thành công', 'Sản phẩm đã được cập nhật!', 'success');
        // } else {
        //     alert('Thành công', 'Đã thêm vào giỏ!', 'success');
        // $this->items[$product_id] = $items;
        // }
        // } else {
        // $this->items[$product_id] = $items;
        // alert('Thành công', 'Đã thêm vào giỏ!', 'success');
        // }


        session(['cart' => $this->items]);
        // dd(session('cart'));
    }
    public function remove($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }
    public function update($id, $qty = 1)
    {
        // $product = Product::findOrFail($id);
        // $inventory = $product->qty;
        if (isset($this->items[$id])) {

            $this->items[$id]['qty'] = $qty;

            // if ($this->items[$id]['qty'] > $inventory) {
            //     alert('Thất bại', 'Số lượng trong giỏ hàng không thể lớn hơn số lượng trong kho!', 'warning');
            //     return;
            // }
            toast('Giỏ hàng đã được cập nhật!', 'success');
        }
        session(['cart' => $this->items]);
    }
    public function clear()
    {
        session(['cart' => []]);
    }
    public function get_total_price()
    {
        $t = 0;
        foreach ($this->items as $key => $value) {
            $t += $value['price'] * $value['qty'];
        }
        return $t;
    }
    public function get_total_quantity()
    {
        $t = 0;
        foreach ($this->items as $key => $value) {
            $t += $value['qty'];
        }
        return $t;
    }
}

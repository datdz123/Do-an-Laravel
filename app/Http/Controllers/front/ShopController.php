<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $products = Product::where('name', 'like', '%'  . $search . '%');
        $products = $this->filter($products, $request);
        $sort_by = $request->sort_by ?? 'new-product';
        switch ($sort_by) {
            case 'new-product':
                $products = $products->orderBy('created_at', 'DESC');
                break;
            case 'old-product':
                $products = $products->orderBy('created_at', 'ASC');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderBy('price', 'DESC');
                break;
            default:
        };

        $categories = ProductCategory::get();

        $products = $products->where('status', 'active')->orderBy('created_at', 'DESC')->paginate(9);
        return view('front/shop', compact('products', 'categories'));
    }
    function category($id, Request $request)
    {
        $search = $request->search ?? '';
        $products = Product::where('products.name', 'like', '%'  . $search . '%');

        $products = $this->filter($products, $request);

        $sort_by = $request->sort_by ?? 'new-product';
        switch ($sort_by) {
            case 'new-product':
                $products = $products->orderBy('created_at', 'DESC');
                break;
            case 'old-product':
                $products = $products->orderBy('created_at', 'ASC');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderBy('price', 'DESC');
                break;
            default:
        };
        if (ProductCategory::where('parent_id', $id)->count() > 0) {
            $products = $products->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
                ->select('products.*', 'product_categories.parent_id')
                ->where('product_categories.parent_id', $id);
        } else {
            $products = $products->where('product_category_id', $id);
        }
        $categories = ProductCategory::get();
        $products = $products->where('status', 'active')->paginate(9);


        return view('front/shop', compact('products', 'categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function filter($products, Request $request)
    {
        $max = null;
        $min = null;
        $price = $request->price ?? [];
        if ($request->price) {
            $price = explode("->", $price);
            $min = $price[0];
            $max = $price[1];
        }
        if ($max == '') {
            $max = 9999999999;
        }
        $products = ($max != null && $min != null) ? $products->whereBetween('price', [$min, $max]) : $products;
        return $products;
    }

    // public function filter($products, Request $request)
    // {
    //     $min = 0;
    //     $max = 0;
    //     $price = $request->price ?? [];
    //     $price = array_keys($price);
    //     $price = implode(' ', $price);

    //     $price = explode("->", $price);
    //     // dd($price);
    //     // dd($price);
    //     if ($request->price) {
    //         $min = $price[0];
    //         $max = $price[1];
    //     }
    //     // dd($min, $max);
    //     // switch ($price) {
    //     //     case '0->100000':
    //     //         $max = 100000;
    //     //         $min = 0;
    //     //         break;
    //     //     case '100000->300000':
    //     //         $max = 300000;
    //     //         $min = 100000;
    //     //         break;
    //     //     case '300000->500000':
    //     //         $max = 500000;
    //     //         $min = 300000;
    //     //         break;
    //     //     case '500000->1000000':
    //     //         $max = 1000000;
    //     //         $min = 500000;
    //     //         break;
    //     //     case '>1000000':
    //     //         $max = 9999999999;
    //     //         $min = 1000000;
    //     //         break;
    //     //     default:
    //     //         # code...
    //     //         break;
    //     // }
    //     // dd($max);

    //     //  $products = $price != null ? $products->whereIn('') : $products;
    //     $products = ($max != null && $min != null) ? $products->whereBetween('price', [$min, $max]) : $products;
    //     // dd($products->get());
    //     return $products;
    // }


    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output = "";
            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->get();
            if($products->count() > 0)
            {
                foreach ($products as $product) {
                    $output .= '<li>' . $product->name . '</li>';
                }
                return response($output);
            }
        }
    }

}

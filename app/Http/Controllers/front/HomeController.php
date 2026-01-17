<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rootCategories = ProductCategory::where('parent_id', 0)
            ->whereIn('slug', ['thoi-trang-nam', 'thoi-trang-nu', 'do-tre-em'])
            ->with('allChildren')
            ->get();
        $categoriesWithProducts = $rootCategories->map(function ($rootCategory) {
            $categoryIds = $rootCategory->getAllChildIds();
            $products = Product::whereIn('product_category_id', $categoryIds)
                ->with('productCategory')
                ->active()
                ->orderBy('created_at', 'DESC')
                ->limit(6)
                ->get();

            return [
                'category' => $rootCategory,
                'products' => $products,
            ];
        });

        $slider = Slider::orderBy('created_at', 'DESC')->get();
        $banner = Banner::orderBy('created_at', 'DESC')->where('status', 'active')->get();
        return view('front/index', compact('categoriesWithProducts', 'slider', 'banner'));
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

    public function changeLanguage($language)
    {
        \Illuminate\Support\Facades\Session::put('locale', $language);
        return redirect()->back();
    }
}

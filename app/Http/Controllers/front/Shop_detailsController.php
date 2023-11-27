<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Shop_detailsController extends Controller
{
    function index($id)
    {
        $product_detail = Product::findOrFail($id);

        $productComments = ProductComment::where('product_id', $id)->orderBy('created_at', 'DESC')->get();

        // tính rating
        $avgRating = 0;
        $sumRating = array_sum(array_column($product_detail->productComments->toArray(), 'rating'));
        $countRating = count($product_detail->productComments);
        if ($countRating != 0) {
            $avgRating = $sumRating / $countRating;
        }

        // dd($avgRating);

        //sản phẩm liên quan
        $relatedProducts = Product::where('product_category_id', $product_detail->product_category_id)
            ->whereNotIn('id', [$product_detail->id])
            ->limit(5)
            ->distinct()
            ->get();
        // dd($relatedProducts->count());

        return view('front/detail', compact('product_detail', 'relatedProducts', 'productComments', 'avgRating'));
    }
    function product_comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
            'messages' => 'required | max:255',
        ]);
        if ($validator->passes()) {
            ProductComment::create($request->all());
            $comments = ProductComment::where('product_id', $request->product_id)->orderBy('created_at', 'DESC')->get();

            $outPut = '';
            foreach ($comments as $item) :
                $outPut .= '
            <div class="media mb-4">
                <img src=" ' . url('front/img/productComment.jpg') . ' " alt="Image"
                    class="img-fluid mr-3 mt-1" style="width: 45px;">
                <div class="media-body">
                    <h6>' . $item->user->name . '<small> -
                            <i>' . $item->created_at . '</i></small>
                    </h6>
                    <div class="text-primary mb-2">';
                for ($i = 1; $i <= 5; $i++) :
                    if ($i <= $item->rating)
                        $outPut .= '<i class="fas fa-star"></i>';
                    else
                        $outPut .= '<i class="far fa-star"></i>';
                endfor;
                $outPut .= '  </div>
                    <p>' . $item->messages . '.</p>
                </div>
            </div>
            ';
            endforeach;

            return response(['success' => 'Đã đánh giá sản phẩm', 'output' => $outPut]);
        } else {
            return response()->json(['errors' => $validator->errors()]);
        }

        return back();
    }
}

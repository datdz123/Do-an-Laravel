<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\UserBehavior;
use App\Services\RecommendationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Shop_detailsController extends Controller
{
    protected $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    function index($id)
    {
        $product_detail = Product::findOrFail($id);

        // Track hành vi xem sản phẩm
        UserBehavior::trackBehavior($id, UserBehavior::ACTION_VIEW);

        $productComments = ProductComment::where('product_id', $id)->orderBy('created_at', 'DESC')->get();

        // tính rating
        $avgRating = 0;
        $sumRating = array_sum(array_column($product_detail->productComments->toArray(), 'rating'));
        $countRating = count($product_detail->productComments);
        if ($countRating != 0) {
            $avgRating = $sumRating / $countRating;
        }

        //sản phẩm liên quan
        $relatedProducts = Product::where('product_category_id', $product_detail->product_category_id)
            ->whereNotIn('id', [$product_detail->id])
            ->limit(5)
            ->distinct()
            ->get();

        // AI Recommendations - Gợi ý sản phẩm bằng Collaborative Filtering
        $recommendations = $this->recommendationService->getRecommendations($id, 8);

        // Người khác cũng mua
        $alsoBought = $this->recommendationService->getAlsoBoughtProducts($id, 4);

        return view('front/detail', compact(
            'product_detail',
            'relatedProducts',
            'productComments',
            'avgRating',
            'recommendations',
            'alsoBought'
        ));
    }

    function product_comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
            'messages' => 'required | max:255',
        ]);
        if ($validator->passes()) {
            ProductComment::create($request->all());

            // Track hành vi đánh giá sản phẩm
            UserBehavior::trackBehavior(
                $request->product_id,
                UserBehavior::ACTION_RATING,
                $request->rating // Score = rating value
            );

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

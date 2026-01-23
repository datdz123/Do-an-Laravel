<?php

namespace App\Services;

use App\Models\Product;
use App\Models\UserBehavior;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

/**
 * RecommendationService - Hệ thống gợi ý sản phẩm sử dụng Collaborative Filtering
 * 
 * Thuật toán Item-based Collaborative Filtering:
 * 1. Tính độ tương tự giữa các sản phẩm dựa trên hành vi người dùng
 * 2. Gợi ý sản phẩm tương tự với những gì người dùng đã tương tác
 * 3. Sử dụng Cosine Similarity để tính độ tương đồng
 */
class RecommendationService
{
    // Cache time in minutes
    const CACHE_TIME = 60;

    // Số lượng sản phẩm gợi ý tối đa
    const MAX_RECOMMENDATIONS = 8;

    /**
     * Lấy sản phẩm gợi ý cho user hiện tại
     * 
     * @param int|null $currentProductId - Sản phẩm đang xem (để loại trừ)
     * @param int $limit - Số lượng sản phẩm gợi ý
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRecommendations($currentProductId = null, $limit = 8)
    {
        $userId = auth()->id();
        $sessionId = session()->getId();

        // Cache key dựa trên user/session
        $cacheKey = $userId
            ? "recommendations_user_{$userId}_{$currentProductId}"
            : "recommendations_session_{$sessionId}_{$currentProductId}";

        return Cache::remember($cacheKey, self::CACHE_TIME, function () use ($userId, $sessionId, $currentProductId, $limit) {
            // Lấy các sản phẩm mà user đã tương tác
            $userProducts = $this->getUserInteractedProducts($userId, $sessionId);

            if ($userProducts->isEmpty()) {
                // Nếu user mới, trả về sản phẩm phổ biến nhất
                return $this->getPopularProducts($currentProductId, $limit);
            }

            // Áp dụng Collaborative Filtering
            $recommendations = $this->collaborativeFiltering($userProducts, $currentProductId, $limit);

            // Nếu không đủ recommendations, bổ sung bằng sản phẩm phổ biến
            if ($recommendations->count() < $limit) {
                $excludeIds = $recommendations->pluck('id')->toArray();
                if ($currentProductId) {
                    $excludeIds[] = $currentProductId;
                }
                $popular = $this->getPopularProducts($excludeIds, $limit - $recommendations->count());
                $recommendations = $recommendations->merge($popular);
            }

            return $recommendations->take($limit);
        });
    }

    /**
     * Lấy các sản phẩm mà user đã tương tác
     */
    private function getUserInteractedProducts($userId, $sessionId)
    {
        return UserBehavior::select('product_id', DB::raw('SUM(score) as total_score'))
            ->when($userId, function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            })
            ->when(!$userId, function ($query) use ($sessionId) {
                return $query->where('session_id', $sessionId);
            })
            ->groupBy('product_id')
            ->orderByDesc('total_score')
            ->limit(20) // Giới hạn để tránh query quá lớn
            ->get();
    }

    /**
     * Item-based Collaborative Filtering
     * 
     * Thuật toán:
     * 1. Với mỗi sản phẩm user đã tương tác, tìm các user khác cũng tương tác
     * 2. Xem những user đó còn tương tác với sản phẩm nào khác
     * 3. Rank những sản phẩm đó theo điểm similarity
     */
    private function collaborativeFiltering($userProducts, $excludeProductId, $limit)
    {
        $productIds = $userProducts->pluck('product_id')->toArray();

        // Loại bỏ sản phẩm hiện tại
        if ($excludeProductId) {
            $productIds = array_diff($productIds, [$excludeProductId]);
        }

        if (empty($productIds)) {
            return collect();
        }

        // Tìm các user khác đã tương tác với cùng sản phẩm
        $similarUsers = UserBehavior::whereIn('product_id', $productIds)
            ->when(auth()->id(), function ($query) {
                return $query->where('user_id', '!=', auth()->id());
            })
            ->whereNotNull('user_id')
            ->select('user_id')
            ->distinct()
            ->limit(100) // Giới hạn số user để tối ưu performance
            ->pluck('user_id');

        if ($similarUsers->isEmpty()) {
            // Fallback: sử dụng content-based (cùng category)
            return $this->getCategoryBasedRecommendations($productIds, $excludeProductId, $limit);
        }

        // Tìm sản phẩm mà các similar users đã tương tác
        $recommendedProducts = UserBehavior::select(
            'product_id',
            DB::raw('SUM(score) as similarity_score'),
            DB::raw('COUNT(DISTINCT user_id) as user_count')
        )
            ->whereIn('user_id', $similarUsers)
            ->whereNotIn('product_id', $productIds)
            ->when($excludeProductId, function ($query) use ($excludeProductId) {
                return $query->where('product_id', '!=', $excludeProductId);
            })
            ->groupBy('product_id')
            ->orderByDesc('similarity_score')
            ->orderByDesc('user_count')
            ->limit($limit * 2) // Lấy nhiều hơn để filter
            ->pluck('product_id');

        // Lấy thông tin chi tiết sản phẩm
        return Product::whereIn('id', $recommendedProducts)
            ->where('status', 'active')
            ->where('qty', '>', 0)
            ->limit($limit)
            ->get();
    }

    /**
     * Fallback: Gợi ý dựa trên category (Content-based)
     */
    private function getCategoryBasedRecommendations($productIds, $excludeProductId, $limit)
    {
        // Lấy categories của các sản phẩm đã tương tác
        $categoryIds = Product::whereIn('id', $productIds)
            ->pluck('product_category_id')
            ->unique();

        $excludeIds = $productIds;
        if ($excludeProductId) {
            $excludeIds[] = $excludeProductId;
        }

        return Product::whereIn('product_category_id', $categoryIds)
            ->whereNotIn('id', $excludeIds)
            ->where('status', 'active')
            ->where('qty', '>', 0)
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    /**
     * Lấy sản phẩm phổ biến nhất (cho user mới hoặc fallback)
     */
    private function getPopularProducts($excludeIds = null, $limit = 8)
    {
        // Lấy product_ids có popularity score cao nhất từ user_behaviors
        $popularProductIds = UserBehavior::select('product_id', DB::raw('SUM(score) as total_score'))
            ->groupBy('product_id')
            ->orderByDesc('total_score')
            ->limit($limit * 2)
            ->pluck('product_id');

        $query = Product::where('status', 'active')
            ->where('qty', '>', 0);

        if ($excludeIds) {
            if (is_array($excludeIds)) {
                $query->whereNotIn('id', $excludeIds);
            } else {
                $query->where('id', '!=', $excludeIds);
            }
        }

        // Nếu có popular products từ behaviors, ưu tiên chúng
        if ($popularProductIds->isNotEmpty()) {
            // Lọc ra những product_id không bị exclude
            $filteredIds = $popularProductIds;
            if ($excludeIds) {
                $excludeArray = is_array($excludeIds) ? $excludeIds : [$excludeIds];
                $filteredIds = $popularProductIds->diff($excludeArray);
            }

            if ($filteredIds->isNotEmpty()) {
                return Product::whereIn('id', $filteredIds)
                    ->where('status', 'active')
                    ->where('qty', '>', 0)
                    ->limit($limit)
                    ->get();
            }
        }

        // Fallback: Lấy sản phẩm ngẫu nhiên nếu không có behavior data
        return $query->inRandomOrder()->limit($limit)->get();
    }

    /**
     * Lấy sản phẩm "Người khác cũng mua" dựa trên order history
     */
    public function getAlsoBoughtProducts($productId, $limit = 4)
    {
        $cacheKey = "also_bought_{$productId}";

        return Cache::remember($cacheKey, self::CACHE_TIME * 2, function () use ($productId, $limit) {
            // Tìm các order có chứa sản phẩm này
            $orderIds = DB::table('order_details')
                ->where('product_id', $productId)
                ->pluck('order_id');

            if ($orderIds->isEmpty()) {
                return collect();
            }

            // Lấy product_ids từ cùng đơn hàng (trừ sản phẩm hiện tại)
            $productIds = DB::table('order_details')
                ->select('product_id', DB::raw('COUNT(*) as buy_count'))
                ->whereIn('order_id', $orderIds)
                ->where('product_id', '!=', $productId)
                ->groupBy('product_id')
                ->orderByDesc('buy_count')
                ->limit($limit)
                ->pluck('product_id');

            if ($productIds->isEmpty()) {
                return collect();
            }

            // Lấy thông tin products
            return Product::whereIn('id', $productIds)
                ->where('status', 'active')
                ->where('qty', '>', 0)
                ->limit($limit)
                ->get();
        });
    }

    /**
     * Clear cache recommendations cho user
     */
    public static function clearUserCache($userId = null)
    {
        if ($userId) {
            Cache::forget("recommendations_user_{$userId}");
        } else {
            $sessionId = session()->getId();
            Cache::forget("recommendations_session_{$sessionId}");
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBehavior extends Model
{
    use HasFactory;

    protected $table = 'user_behaviors';

    // Các loại hành vi và điểm tương ứng
    const ACTION_VIEW = 'view';
    const ACTION_CART = 'cart';
    const ACTION_PURCHASE = 'purchase';
    const ACTION_RATING = 'rating';

    // Điểm weight cho từng loại hành vi
    const SCORE_VIEW = 1.0;
    const SCORE_CART = 3.0;
    const SCORE_PURCHASE = 5.0;

    protected $fillable = [
        'user_id',
        'product_id',
        'session_id',
        'action_type',
        'score',
    ];

    /**
     * Quan hệ với User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Quan hệ với Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Ghi nhận hành vi người dùng
     */
    public static function trackBehavior($productId, $actionType, $score = null)
    {
        $userId = auth()->id();
        $sessionId = session()->getId();

        // Xác định score nếu không được truyền vào
        if ($score === null) {
            switch ($actionType) {
                case self::ACTION_VIEW:
                    $score = self::SCORE_VIEW;
                    break;
                case self::ACTION_CART:
                    $score = self::SCORE_CART;
                    break;
                case self::ACTION_PURCHASE:
                    $score = self::SCORE_PURCHASE;
                    break;
                default:
                    $score = 1.0;
            }
        }

        // Kiểm tra xem hành vi này đã tồn tại chưa (tránh duplicate)
        $existingBehavior = self::where('product_id', $productId)
            ->where('action_type', $actionType)
            ->when($userId, function ($query) use ($userId) {
                return $query->where('user_id', $userId);
            })
            ->when(!$userId, function ($query) use ($sessionId) {
                return $query->where('session_id', $sessionId);
            })
            ->first();

        if ($existingBehavior) {
            // Nếu đã tồn tại, cập nhật score nếu score mới cao hơn
            if ($score > $existingBehavior->score) {
                $existingBehavior->update(['score' => $score]);
            }
            return $existingBehavior;
        }

        // Tạo mới behavior record
        return self::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'session_id' => $sessionId,
            'action_type' => $actionType,
            'score' => $score,
        ]);
    }
}

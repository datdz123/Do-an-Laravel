<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primarykey = 'id';
    protected $quarded = [];
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'street_address',
        'note',
        'provincial',
        'district',
        'ward',
        'payment_method',
        'payment_status',
        'status',
        'total'
    ];

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class ,'order_id','id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    const NEW = 1;
    const DELIVERY = 2;
    const DONE = 3;
    protected $fillable = [
        'shipping_price',
        'status',
        'cart_id',
        'shipping_address',
        'phone'
    ];

    const STATUS = [
        self::NEW => '<strong class="text-success">Tiếp nhận đơn hàng</strong>',
        self::DELIVERY => '<strong class="text-warning">Đang giao hàng</strong>',
        self::DONE => '<strong>Hoàn thành</strong>'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function getStatusLabelAttribute()
    {
        return self::STATUS[$this->status];
    }

    public function getOrderDateAttribute()
    {
        if (!$this->created_at) {
            return '';
        }
        return $this->created_at->format('d/m/Y H:i');
    }

    public static function sendDeliveryEmail()
    {

    }

    public static function sendDoneEmail()
    {

    }

    public function isDelivery()
    {
        return $this->status == self::DELIVERY;
    }

    public function isDone()
    {
        return $this->status == self::DONE;
    }
}

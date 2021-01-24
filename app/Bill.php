<?php

namespace App;

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
    ];

    const STATUS = [
        self::NEW => '<strong class="text-success">Mới</strong>',
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
}

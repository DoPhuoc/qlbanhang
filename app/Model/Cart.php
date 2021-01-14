<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products')
            ->withPivot('quantity', 'price', 'discount');
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function totalMoney()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->pivot->quantity * $product->price;
        }
        return number_format($total);
    }

    public function productName(){
        $totalProduct = $this->products->count() ;
        if($totalProduct==1) return $this->products->first()->name;
        return $this->products->first()->name." và ".(--$totalProduct)." sản phẩm khác";
    }
}

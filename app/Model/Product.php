<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    public $fillable = [
        'product_id',
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'image',
        'best_selling',
        'size',
        'quantity',
        'price',
        'status',
        'sale_off',
        'code_product',
        'created_at',
        'updated_at'
    ];

    const BEST_SELLING = 1;
    const NOT_BEST_SELLING = 0;

    public function brand()
    {
        return $this->belongsTo('App\Model\Brand', 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id', 'id');
    }

    public function getImageFullPathAttribute(): string
    {
        if (!$this->image) {
            return '';
        }
        return asset('uploads/images/products') . '/' . $this->image;
    }

    public function getTotalPrice()
    {
        if (!$this->pivot) {
            return 0;
        }
        return number_format($this->pivot->price * $this->pivot->quantity)  . ' VND';
    }
}

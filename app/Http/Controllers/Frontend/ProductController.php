<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('frontend.product.detail');
    }

    public function getProductsBelongCategory()
    {
        $products = Category::findOrFail(request()->id)->products;
        return view(
            'frontend.products.list',
            [
                'products' => $products
            ]
        );
    }

    public function show()
    {
        return view(
        'frontend.products.show',
        [
            'product' => Product::findOrFail(request()->id)
        ]
    );
    }
}

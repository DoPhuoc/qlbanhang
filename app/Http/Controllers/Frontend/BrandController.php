<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
class BrandController extends Controller
{
    public function getProductBelongBrand(){
        $products = Brand::findOrFail(request()->id)->products;
        return view(
            'frontend.products.list',
            [
                'products' => $products
            ]
        );
    }
}

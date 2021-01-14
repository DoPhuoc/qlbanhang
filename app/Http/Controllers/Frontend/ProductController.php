<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('frontend.product.detail');
    }
    public function getProductBelongCategory(){
        DB::table('products')->where('categories_id',id);
        return view('admin.product.listproduct');
    }
}

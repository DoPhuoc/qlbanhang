<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.listproduct');
    }
    public function Addproduct()
    {
        return view('admin.product.add-product');
    }

}

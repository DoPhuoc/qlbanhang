<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class FrontendController extends Controller
{

    public function index(){
        $today = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d H:i:s', strtotime('-30days'));
        $newProduct = DB::table('products')
                        ->where('status',1)
                        ->whereBetween('created_at',[$yesterday, $today])
                        ->offset(0)
                        ->limit(8)
                        ->get();
        $newBanner = DB::table('banners')
                        ->where('status',1)
                        ->offset(0)
                        ->limit(8)
                        ->get();
        $categories = DB::table('categories')
            ->get();
        $brands = DB::table('brands')->where('status',0)
            ->get();
        return view('frontend.home.index',compact('newProduct','newBanner','categories','brands'));
    }
}

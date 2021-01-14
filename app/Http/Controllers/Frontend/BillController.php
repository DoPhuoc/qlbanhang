<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    //
    public function show(){
        $carts = Cart::where('user_id', Auth::id())->whereHas('bill')->get();

        return view('frontend.bills.show',compact('carts'));
    }
    public function showDetail(){
        $carts = Cart::where('user_id', Auth::id())->whereHas('bill')->get();

        return view('frontend.bill.showDetail',compact('carts'));
    }
}

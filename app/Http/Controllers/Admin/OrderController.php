<?php

namespace App\Http\Controllers\Admin;

use App\Bill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Bill::with('cart')
            ->orderBy('status')
            ->latest()
            ->get();
        return view('admin.order.list', ['orders' => $orders]);
    }
    public function addShipping(){
        return view('admin.order.add');
    }
    public function editShipping(){
        return view('admin.order.edit');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Bill;
use App\Model\Cart;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Bill::with('cart')
            ->orderBy('status')
            ->latest()
            ->get();
        return view('admin.order.list', ['orders' => $orders]);
    }

    public function getNewOrders()
    {
        $orders = Bill::with('cart')
            ->where('status', Bill::NEW)
            ->orderBy('status')
            ->latest()
            ->get();
        return view('admin.order.new', ['orders' => $orders]);
    }

    public function getDeliveryOrders()
    {
        $orders = Bill::with('cart')
            ->where('status', Bill::DELIVERY)
            ->orderBy('status')
            ->latest()
            ->get();
        return view('admin.order.delivery', ['orders' => $orders]);
    }

    public function getDoneOrders()
    {
        $orders = Bill::with('cart')
            ->where('status', Bill::DONE)
            ->orderBy('status')
            ->latest()
            ->get();
        return view('admin.order.done', ['orders' => $orders]);
    }

    public function edit(Request $request, Bill $bill)
    {
        return view('admin.order.edit', ['bill' => $bill]);
    }

    public function update(Request $request, Bill $bill)
    {
        $status = request()->status;
        $bill->status = $status;
        $bill->update();
        if ($status == Bill::DELIVERY) {
            Bill::sendDeliveryEmail();
            Alert::success('Đơn hàng đang được vận chuyển!!');
        } elseif ($status == Bill::DONE) {
            Alert::success('Hoàn thành đơn hàng!!');
            Bill::sendDoneEmail();
        }
        return redirect()->route('admin.order.new');
    }
}

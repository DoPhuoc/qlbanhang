<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Cart;

class StatisticController extends Controller
{
    public function sale()
    {
        $selectedDate = now();
        $carts = Cart::with('products.category')
            ->whereHas('bill', function ($query) use ($selectedDate) {
                $query->whereDate('created_at', $selectedDate);
            })->get();
        $statistics = [];
        foreach ($carts as $cart) {
            foreach ($cart->products as $product) {
                if (isset($statistics[$product->name])) {
                    $statistics[$product->name] += $product->pivot->quantity;
                } else {
                    $statistics[$product->name] = $product->pivot->quantity;
                }
            }
        }
        $label = array_keys($statistics);
        $datasetsData = array_values($statistics);
        return view(
            'admin.statistics.sale',
            [
                'selectedDate' => $selectedDate,
                'chartData' => [
                    'label' => $label,
                    'datasetsData' => $datasetsData
                ]
            ]
        );
    }
}

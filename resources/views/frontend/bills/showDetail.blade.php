
@extends('frontend.frontend-layout')

@section('content')
    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                        <tr class="main-hading">
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Giảm giá</th>
                            <th class="text-center">Thành tiền</th>
{{--                            <th class="text-center">Trạng thái đơn hàng</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($bills as $bill)
                            <tr>
                                    <td class="product-id" data-title="id">
                                        {{ $bill->name}}
                                    </td>
                            </tr>
                                <td class="product-id" data-title="id">
                                    <?php
                                    $totalProduct = $cart->products->count() ;
                                    if($totalProduct==1) echo $cart->products->first()->name;
                                    else echo $cart->products->first()->name." và ".(--$totalProduct)." sản phẩm khác";
                                    ?>
                                </td>
                                <td class="price" data-title="Price">
                                        {{$cart->created_at}}
                                </td>

                                <td class="total-amount" data-title="Total">
                                    {{$cart->totalMoney()}}
                                </td>
{{--                                <td class="qty" data-title="Qty">--}}
{{--                                    {{$cart->bill->price}}--}}
{{--                                </td>--}}
                        @empty
                            Bạn không có đơn hàng nào!!
                        @endforelse
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection

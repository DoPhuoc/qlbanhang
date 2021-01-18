
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
                        @foreach($cart->products as $product)
                            <tr>
                                    <td class="product-id" data-title="id">
                                        {{ $product->name}}
                                    </td>
                                <td class="product-id" data-title="id">
                                    {{ $product->price}}
                                </td>
                                <td class="product-id" data-title="id">
                                    {{ $product->quantity}}
                                </td>
                                <td class="product-id" data-title="id">
                                    {{ $product->sale_off}}%
                                </td>
                                <td class="price" data-title="Price">
                                    {{$cart->totalMoney()}}
                                </td>

                            </tr>
                        </tbody>
                        @endforeach
                        <tfoot><tr><td colspan="4"><span>Tạm tính</span></td><td>{{$cart->totalMoney()}} VND</td></tr>
                        <tr><td colspan="4"><span>Phí vận chuyển</span></td><td>25.000 ₫</td></tr>
                        <tr><td colspan="4"><span>Tổng cộng</span></td><td><span class="sum">252.000 ₫</span></td></tr>
                        </tfoot>


                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection

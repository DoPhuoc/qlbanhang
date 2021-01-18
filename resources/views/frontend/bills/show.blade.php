
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
                            <th>Mã đơn hàng</th>
                            <th>Sản phẩm</th>
                            <th class="text-center">Ngày mua</th>
                            <th class="text-center">Tổng tiền</th>
                            <th class="text-center">Trạng thái đơn hàng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($carts as $cart)
                            <tr>
                                    <td class="product-id" data-title="id">
                                        <a href="{{route('fr.bill.detail',$cart->id)}}">
                                            {{ $cart->id}}
                                        </a>

                                    </td>
                                <td class="product-id" data-title="id">
                                   {{$cart->productName()}}
                                </td>
                                <td class="price" data-title="Price">
                                        {{$cart->created_at}}
                                </td>

                                <td class="total-amount" data-title="Total">
                                    {{$cart->totalMoney()}}
                                </td>
                                <td class="status" data-title="status_order">
                                    {!! $cart->bill->status_label !!}
                                </td>
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

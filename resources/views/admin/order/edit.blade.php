@extends('admin.admin-layout')
@section('content')
    @php
        $cart = $bill->cart;
    @endphp
    <div class="card order">
        <form method="post"
              action="{{ route('admin.order.update', $bill->id) }}">
            @csrf
            <h5 class="card-header">Chi tiết đơn hàng</h5>
            <div class="card-body">
                <div class="form-group">
                    <h4 class="mb-2">
                        Khách hàng: <span>{{ $cart->user->name }}</span>
                    </h4>
                    <strong class="d-block mb-2">
                        Ngày mua:
                        <span>{{ $bill->created_at->format('d/m/Y') }}</span>
                    </strong>
                    <div>
                        Trạng thái:
                        <select name="status" id="status" @if($bill->isDone()) disabled @endif>
                            @foreach(\App\Model\Bill::STATUS as $key => $status)
                                <option value="{{ $key }}"
                                        @if(old('status', $bill->status) == $key) selected @endif>
                                    {!! $status !!}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <table class="table shopping-summery">
                        <thead>
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th class="text-center">NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($bill->cart->products as $product)
                            <tr>
                                <td class="image" data-title="No">
                                    <a href="{{ route('fr.product.show',
                                        ['slug' => $product->slug, 'id' => $product->id]) }}">
                                        <img style="width: 75px"
                                             src="{{ $product->image_full_path }}"
                                             alt="#">
                                    </a>

                                </td>
                                <td class="product-des text-center"
                                    data-title="Description">
                                    <p class="product-name"><a
                                            href="#">{{$product->name}}</a></p>
                                </td>
                                <td class="price text-center"
                                    data-title="Price"><span>{{$product->price}} VND</span>
                                </td>
                                <td class="qty text-center" data-title="Qty">
                                    {{$product->pivot->quantity}}
                                </td>
                                <td class="total-amount text-right"
                                    data-title="Total">
                                    <span>{{ $product->getTotalPrice() }}</span>
                                </td>
                            </tr>
                        @empty
                            Không có sản phẩm trong giỏ hàng
                        @endforelse
                        </tbody>
                    </table>
                    <div class="right d-flex justify-content-end">
                        <ul>
                            <li>Pre
                                Shipping<span>{{ $cart->totalMoney() }} VND</span>
                            </li>
                            <li>Shipping<span>Free</span></li>
                            <li class="last">You
                                Pay<span>{{ $cart->totalMoney() }} VND</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Quay lại
                    </button>
                    <button class="btn btn-success" type="submit">Cập nhập
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('stylesheets')
    <style>
        .order ul {
            width: 300px;
        }

        .order ul li {
            list-style: none;
            margin-bottom: 12px;
        }

        .order ul li span {
            float: right;
        }

        .last {
            padding-top: 12px;
            border-top: 1px solid #c8c8c8;
            color: #333;
            font-size: 15px;
            font-weight: 400;
        }
    </style>
@endpush

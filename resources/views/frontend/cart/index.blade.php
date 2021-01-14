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
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">TOTAL</th>
                            <th class="text-center"><i
                                    class="ti-trash remove-icon"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($cart->products as $product)
                            <tr>
                                <td class="image" data-title="No">
                                    <a href="{{ route('fr.product.show',
                                        ['slug' => $product->slug, 'id' => $product->id]) }}">
                                        <img
                                            src="{{ $product->image_full_path }}"
                                            alt="#">
                                    </a>

                                </td>
                                <td class="product-des"
                                    data-title="Description">
                                    <p class="product-name"><a
                                            href="#">{{$product->name}}</a></p>
                                    <p class="product-des">{!! $product->description !!}</p>
                                </td>
                                <td class="price" data-title="Price"><span>{{$product->price}} VND</span>
                                </td>
                                <td class="qty" data-title="Qty">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <form
                                                action="{{ route('fr.cart.decrease_product') }}"
                                                method="post">
                                                @csrf
                                                <input type="hidden"
                                                       name="cart_id"
                                                       value="{{ $cart->id }}">
                                                <input type="hidden"
                                                       name="product_id"
                                                       value="{{ $product->id }}">
                                                <button type="submit"
                                                        class="btn btn-primary"
                                                        data-type="minus">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <input type="text" name="quant[1]"
                                               class="input-number"
                                               disabled
                                               data-min="1" data-max="100"
                                               value="{{$product->pivot->quantity}}">
                                        <div class="button plus">
                                            <form
                                                action="{{ route('fr.cart.increase_product') }}"
                                                method="post">
                                                @csrf
                                                <input type="hidden"
                                                       name="cart_id"
                                                       value="{{ $cart->id }}">
                                                <input type="hidden"
                                                       name="product_id"
                                                       value="{{ $product->id }}">
                                                <button type="submit"
                                                        class="btn btn-primary"
                                                        data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </td>
                                <td class="total-amount" data-title="Total">
                                    <span>{{ $product->getTotalPrice() }}</span>
                                </td>
                                <td class="action" data-title="Remove">
                                    <form
                                        action="{{ route('fr.cart.delete_product') }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden"
                                               name="cart_id"
                                               value="{{ $cart->id }}">
                                        <input type="hidden"
                                               name="product_id"
                                               value="{{ $product->id }}">
                                        <button type="submit"
                                                class="bg-transparent border-0">
                                            <i class="ti-trash remove-icon"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            Không có sản phẩm trong giỏ hàng
                        @endforelse
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <form action="{{ route('fr.cart.checkout') }}"
                          method="post">
                        @csrf
                        <input type="hidden" name="cart_id"
                               value="{{ $cart->id }}">
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-8 col-md-5 col-12">
                                    <div class="left">
                                        <div class="coupon">
                                            <form action="#" target="_blank">
                                                <input name="Coupon"
                                                       placeholder="Enter Your Coupon">
                                                <button class="btn">Apply
                                                </button>
                                            </form>
                                        </div>
                                        <div class="checkbox">
                                            <label class="checkbox-inline"
                                                   for="2"><input name="news"
                                                                  id="2"
                                                                  type="checkbox">
                                                Shipping (+10$)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-7 col-12">
                                    <div class="right">
                                        <ul>
                                            <li>Cart Subtotal<span>{{ $cart->totalMoney() }} VND</span>
                                            </li>
                                            <li>Shipping<span>Free</span></li>
                                            <li>You Save<span>$20.00</span></li>
                                            <li class="last">You
                                                Pay<span>{{ $cart->totalMoney() }} VND</span>
                                            </li>
                                        </ul>
                                        <div class="button5">
                                            <button type="submit"
                                                    @if(!$cart->products->count())
                                                    disabled
                                                    @endif
                                                    class="btn">
                                                Checkout
                                            </button>
                                            <a href="{{ url()->previous() }}"
                                               class="btn">Continue
                                                shopping</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection

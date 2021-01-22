@extends('frontend.frontend-layout')
@section('title', 'ban hang')
@section('content')
<!-- Shop Login -->
<section class="shop login section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                    <h2>Đăng ký</h2>
                    <p>Vui lòng đăng ký tài khoản trước khi thanh toán</p>
                    <!-- Form -->
                    <form class="form"
                          method="post"
                          action="{{ route('fr.auth.register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Tên<span>*</span></label>
                                    <input type="text" name="name" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nhập email<span>*</span></label>
                                    <input type="text" name="email" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Nhập password<span>*</span></label>
                                    <input type="password" name="password" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Xác nhận lại password<span>*</span></label>
                                    <input type="password" name="password_confirmation" placeholder="" required="required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group login-btn">
                                    <button class="btn" type="submit">Đăng ký</button>
                                    <a href="{{ route('fr.auth.login') }}" class="btn">Login</a>
                                </div>
                              {{--    <div class="checkbox">
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Sign Up for Newsletter</label>
                                </div>  --}}
                            </div>
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Login -->
@endsection

@extends('frontend.frontend-layout')
@section('title', 'PCCC')

@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<!-- Shop Login -->
		<section class="shop login section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="login-form">
							<h2>Đăng nhập</h2>
							<p>Vui lòng đăng ký tài khoản</p>
							<!-- Form -->
							<form class="form" method="post"
                                  action="{{ route('fr.auth.login') }}">
                                @csrf
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Nhập email<span>*</span></label>
											<input type="email"
                                                   class="@error('email') is-invalid @enderror"
                                                   name="email"
                                                   placeholder=""
                                                   required="required">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Nhập password<span>*</span></label>
											<input type="password"
                                                   name="password"
                                                   class="@error('password') is-invalid @enderror"
                                                   placeholder=""
                                                   required="required">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
										</div>
									</div>
									<div class="col-12">
										<div class="form-group login-btn">
											<button class="btn" type="submit">Đăng nhập</button>
											<a href="{{ route('fr.auth.register') }}" class="btn">Đăng ký</a>
										</div>
										{{--  <div class="checkbox">
											<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Remember me</label>
										</div>  --}}
										{{--  <a href="#" class="lost-pass">Lost your</a>  --}}
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

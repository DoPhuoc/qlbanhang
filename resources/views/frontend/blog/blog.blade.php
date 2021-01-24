@extends('frontend.frontend-layout')

@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="{{ route('fr.home') }}">Trang chủ<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="{{ route('fr.blog') }}">Bài viết</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->
	
<!-- Start Blog Single -->
<section class="blog-single shop-blog grid section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Start Single Blog  -->
						<div class="shop-single-blog">
							<img src="{{-- {{asset('uploads/images/posts')}}/{{$item->image}} --}}" alt="#">
							<div class="content">
								<a href="{{route('fr.blog.detail')}}" class="title">Sed adipiscing ornare.</a>
								<a href="{{route('fr.blog.detail')}}" class="more-btn">Continue Reading</a>
							</div>
						</div>
						<!-- End Single Blog  -->
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Start Single Blog  -->
						<div class="shop-single-blog">
							<img src="images/blog2.jpg" alt="#">
							<div class="content">
								<p class="date">22 July, 2020. Monday</p>
								<a href="#" class="title">Man’s Fashion Winter Sale</a>
								<a href="#" class="more-btn">Continue Reading</a>
							</div>
						</div>
						<!-- End Single Blog  -->
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Start Single Blog  -->
						<div class="shop-single-blog">
							<img src="images/blog3.jpg" alt="#">
							<div class="content">
								<p class="date">22 July, 2020. Monday</p>
								<a href="#" class="title">Women Fashion Festive</a>
								<a href="#" class="more-btn">Continue Reading</a>
							</div>
						</div>
						<!-- End Single Blog  -->
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Start Single Blog  -->
						<div class="shop-single-blog">
							<img src="images/blog1.jpg" alt="#">
							<div class="content">
								<p class="date">22 July , 2020. Monday</p>
								<a href="#" class="title">Sed adipiscing ornare.</a>
								<a href="#" class="more-btn">Continue Reading</a>
							</div>
						</div>
						<!-- End Single Blog  -->
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Start Single Blog  -->
						<div class="shop-single-blog">
							<img src="images/blog2.jpg" alt="#">
							<div class="content">
								<p class="date">22 July, 2020. Monday</p>
								<a href="#" class="title">Man’s Fashion Winter Sale</a>
								<a href="#" class="more-btn">Continue Reading</a>
							</div>
						</div>
						<!-- End Single Blog  -->
					</div>
					<div class="col-lg-6 col-md-6 col-12">
						<!-- Start Single Blog  -->
						<div class="shop-single-blog">
							<img src="images/blog3.jpg" alt="#">
							<div class="content">
								<p class="date">22 July, 2020. Monday</p>
								<a href="#" class="title">Women Fashion Festive</a>
								<a href="#" class="more-btn">Continue Reading</a>
							</div>
						</div>
						<!-- End Single Blog  -->
					</div>
					<div class="col-12">
						<!-- Pagination -->
						<div class="pagination">
							<ul class="pagination-list">
								<li><a href="#"><i class="ti-arrow-left"></i></a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="ti-arrow-right"></i></a></li>
							</ul>
						</div>
						<!--/ End Pagination -->
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="main-sidebar">
					<!-- Single Widget -->
					<div class="single-widget search">
						<div class="form">
							<input type="email" placeholder="Search Here...">
							<a class="button" href="#"><i class="fa fa-search"></i></a>
						</div>
					</div>
					<!--/ End Single Widget -->
					<!-- Single Widget -->
					<div class="single-widget category">
						<h3 class="title">Blog Categories</h3>
						<ul class="categor-list">
							<li><a href="#">Men's Apparel</a></li>
							<li><a href="#">Women's Apparel</a></li>
							<li><a href="#">Bags Collection</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Sun Glasses</a></li>
						</ul>
					</div>
				
					<!--/ End Single Widget -->
					<!-- Single Widget -->
					<!--/ End Single Widget -->
					<!-- Single Widget -->
					<div class="single-widget side-tags">
						<h3 class="title">Tags</h3>
						<ul class="tag">
							<li><a href="#">business</a></li>
							<li><a href="#">wordpress</a></li>
							<li><a href="#">html</a></li>
							<li><a href="#">multipurpose</a></li>
							<li><a href="#">education</a></li>
							<li><a href="#">template</a></li>
							<li><a href="#">Ecommerce</a></li>
						</ul>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blog Single -->
	

@endsection
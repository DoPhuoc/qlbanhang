@extends('frontend.frontend-layout')

@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="blog-single.html">Blog Grid Sidebar</a></li>
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
					<div class="single-widget recent-post">
						<h3 class="title">Recent post</h3>
						<!-- Single Post -->
						<div class="single-post">
							<div class="image">
								<img src="images/modal1.png" alt="#">
							</div>
							<div class="content">
								<h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>
								<ul class="comment">
									<li><i class="fa fa-calendar" aria-hidden="true"></i>Jan 11, 2020</li>
									<li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</li>
								</ul>
							</div>
						</div>
						<!-- End Single Post -->
						<!-- Single Post -->
						<div class="single-post">
							<div class="image">
								<img src="images/modal2.png" alt="#">
							</div>
							<div class="content">
								<h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>
								<ul class="comment">
									<li><i class="fa fa-calendar" aria-hidden="true"></i>Mar 05, 2019</li>
									<li><i class="fa fa-commenting-o" aria-hidden="true"></i>59</li>
								</ul>
							</div>
						</div>
						<!-- End Single Post -->
						<!-- Single Post -->
						<div class="single-post">
							<div class="image">
								<img src="images/modal3.png" alt="#">
							</div>
							<div class="content">
								<h5><a href="#">Top 10 Beautyful Women Dress in the world</a></h5>
								<ul class="comment">
									<li><i class="fa fa-calendar" aria-hidden="true"></i>June 09, 2019</li>
									<li><i class="fa fa-commenting-o" aria-hidden="true"></i>44</li>
								</ul>
							</div>
						</div>
						<!-- End Single Post -->
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
					<!--/ End Single Widget -->
					<!-- Single Widget -->
					<div class="single-widget newsletter">
						<h3 class="title">Newslatter</h3>
						<div class="letter-inner">
							<h4>Subscribe & get news <br> latest updates.</h4>
							<div class="form-inner">
								<input type="email" placeholder="Enter your email">
								<a href="#">Submit</a>
							</div>
						</div>
					</div>
					<!--/ End Single Widget -->
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blog Single -->
	

@endsection
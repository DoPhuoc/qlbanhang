@extends('frontend.frontend-layout')
@section('title', 'PCCC')

@section('content')

<!-- Slider Area -->

<!--/ End Slider Area -->

<!-- Start Small Banner  -->
{{-- <section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            @foreach($newBanner as $key => $item)
            <!-- Single Banner  -->
            <div class="col-lg-4 col-md-6 col-12">
               
                <div class="single-banner">
                    <img src="{{asset('uploads/images/banners')}}/{{$item->photo}}" alt="#">
                    <div class="content">
           
                    </div>
                </div>
             
            </div>
            @endforeach
        </div>
    </div>
</section> --}}

@if(count($newBanner)>0)
    <section id="Gslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($newBanner as $key=>$banner)
        <li data-target="#Gslider" data-slide-to="{{$key}} {{(($key==0)? 'active' : '')}}" class=""></li>
            @endforeach

        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($newBanner as $key=>$banner)
                <div class="carousel-item  {{(($key==0)? 'active' : '')}}">
                    <img class="first-slide" src="{{asset('uploads/images/banners')}}/{{$banner->photo}}" style="width:100%"; alt="First slide">
                  {{--   <div class="carousel-caption d-none d-md-block text-left">
                        <h1 class="wow fadeInDown">{{$banner->title}}</h1>
                        <p>{!! html_entity_decode($banner->description) !!}</p>
                        <a class="btn btn-lg ws-btn wow fadeInUpBig" href="" role="button">Shop Now<i class="far fa-arrow-alt-circle-right"></i></i></a>
                    </div> --}}
                </div>  
            @endforeach   
        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </section>
@endif
<!-- End Small Banner -->

		


<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            
                            <h3 class="title">DANH MỤC</h3>
                            <ul class="categor-list">
                                <li><a href="#">BÌNH CHỮA CHÁY</a></li>
                                <li><a href="#">QUẦN ÁO</a></li>
                                <li><a href="#">HỆ THỐNG CHỮA CHÁY</a></li>
                                <li><a href="#">THIẾT BỊ HOCHIKI</a></li>
                                <li><a href="#">THIẾT BỊ HOCHIKI</a></li>
                                <li><a href="#">THIẾT BỊ HOCHIKI</a></li>
                          
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Shop By Price -->
                            <div class="single-widget range">
                                <h3 class="title">Lượt truy cập</h3>
                                <div class="price-filter">
                                    <div class="price-filter-inner">
                                        <div id="slider-range"></div>
                                            <div class="price_slider_amount">
                                            <div class="label-input">
                                                <span>Đang trực tuyến:</span><input type="text" id="amount" name="price" placeholder="0000001"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         
                            </div>
                            <!--/ End Shop By Price -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">Sản phẩm bán chạy</h3>
                            <!-- Single Post -->
                            <div class="single-post first">
                                <div class="image">
                                    <img src="https://via.placeholder.com/75x75" alt="#">
                                </div>
                                <div class="content">
                                    <h5><a href="#">Bình cứu hỏa</a></h5>
                                    <p class="price">100.000Đ</p>
                                    <ul class="reviews">
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-post first">
                                <div class="image">
                                    <img src="https://via.placeholder.com/75x75" alt="#">
                                </div>
                                <div class="content">
                                    <h5><a href="#">Bình cứu hỏa</a></h5>
                                    <p class="price">100.000Đ</p>
                                    <ul class="reviews">
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-post first">
                                <div class="image">
                                    <img src="https://via.placeholder.com/75x75" alt="#">
                                </div>
                                <div class="content">
                                    <h5><a href="#">Bình cứu hỏa</a></h5>
                                    <p class="price">100.000Đ</p>
                                    <ul class="reviews">
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li class="yellow"><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                        <li><i class="ti-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Post -->
                          
                            <!-- End Single Post -->
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Thương hiệu</h3>
                            <ul class="categor-list">
                                <li><a href="#">Forever</a></li>
                                <li><a href="#">giordano</a></li>
                                <li><a href="#">abercrombie</a></li>
                                <li><a href="#">ecko united</a></li>
                                <li><a href="#">zara</a></li>
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                    <div class="col-12">
                        <!-- Shop Top -->
                        <div class="shop-top">
                            <div class="shop-shorter">
                                <div class="single-shorter">
                                    <label>Show :</label>
                                    <select>
                                        <option selected="selected">09</option>
                                        <option>15</option>
                                        <option>25</option>
                                        <option>30</option>
                                    </select>
                                </div>
                                <div class="single-shorter">
                                    <label>SẮP XẾP :</label>
                                    <select>
                                        <option selected="selected">MẶC ĐỊNH</option>
                                        <option>GIÁ TĂNG DẦN</option>
                                        <option>GIÁ GIẢM DẦN</option>
                                    </select>
                                </div>
                            </div>
                            <ul class="view-mode">
                                <li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
                                <li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                        </div>
                        <!--/ End Shop Top -->
                    </div>
                </div>
                <div class="row">
                @if(count($newProduct)>0)
                    @foreach($newProduct as $key => $item)
                    <div class="col-lg-4 col-md-6 col-12">
                         
                        <div class="single-product">
                            <div class="product-img">
                               
                                <a href="product-details.html">
                                    <img class="default-img"  src="{{asset('uploads/images/products')}}/{{$item->image}}" alt="#">
                                    <img class="hover-img" src="{{asset('uploads/images/products')}}/{{$item->image}}" alt="#">
                                </a>
                              
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a title="Add to cart" href="#">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="product-details.html">{{$item->name_product}}</a></h3>
                                <div class="product-price">
                                    <span>{{number_format($item->price).''.'VNĐ'}}</span>
                                    </span>
                                </div>
                            </div>
                            

                        </div>
                        
                    </div>
                    @endforeach
                @endif
                 
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Product Style 1  -->	





@endsection
@push('stylesheets')
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #000000;
        color:black;

        }

        #Gslider .carousel-inner{
        height: 550px;
        position: relative;
        width: 100%;

        }
        #Gslider .carousel-inner img{
            
            opacity: .8;
           
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 100px;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        color: #F7941D;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }
    </style>
@endpush
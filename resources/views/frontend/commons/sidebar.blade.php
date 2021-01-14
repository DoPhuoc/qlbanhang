<div class="shop-sidebar">
    <!-- Single Widget -->
    <div class="single-widget category">

        <h3 class="title">DANH MỤC</h3>
        @foreach($categories as $category)
            <ul class="categor-list">
                <li>
                    <a href="{{route('fr.category.product',[$category->slug,$category->id])}}}">{{$category->name}}</a>
                </li>
            </ul>
        @endforeach
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
                        <span>Đang trực tuyến:</span><input
                            type="text" id="amount"
                            name="price"
                            placeholder="0000001"/>
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
                <img src="https://via.placeholder.com/75x75"
                     alt="#">
            </div>
            <div class="content">
                <h5><a href="#">Bình cứu hỏa</a></h5>
                <p class="price">100.000Đ</p>
                <ul class="reviews">
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                </ul>
            </div>
        </div>
        <div class="single-post first">
            <div class="image">
                <img src="https://via.placeholder.com/75x75"
                     alt="#">
            </div>
            <div class="content">
                <h5><a href="#">Bình cứu hỏa</a></h5>
                <p class="price">100.000Đ</p>
                <ul class="reviews">
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                </ul>
            </div>
        </div>
        <div class="single-post first">
            <div class="image">
                <img src="https://via.placeholder.com/75x75"
                     alt="#">
            </div>
            <div class="content">
                <h5><a href="#">Bình cứu hỏa</a></h5>
                <p class="price">100.000Đ</p>
                <ul class="reviews">
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li class="yellow"><i
                            class="ti-star"></i></li>
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
            @foreach($brands as $brand)
                <li>
                    <a href="{{route('fr.brand.product',$brand->slug)}}">{{$brand->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <!--/ End Single Widget -->
</div>

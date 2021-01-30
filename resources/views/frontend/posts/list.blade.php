@extends('frontend.frontend-layout')
@section('title', 'PCCC')

@section('content')
    @include('frontend.commons.banner')
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    @include('frontend.commons.sidebar')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Show :</label>
                                        <select class="pagination">
                                            @foreach(config('pagination') as $pagination)
                                                <option
                                                    @if(request('pagination') == $pagination) selected="selected" @endif>
                                                    {{ $pagination }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="single-shorter">
                                        <label>SẮP XẾP :</label>
                                        <select class="order-type">
                                            <option value="">MẶC ĐỊNH</option>
                                            <option value="asc"
                                                    @if(request('order_type') == 'asc') selected @endif>
                                                GIÁ TĂNG DẦN
                                            </option>
                                            <option value="desc"
                                                    @if(request('order_type') == 'desc') selected @endif>
                                                GIÁ GIẢM DẦN
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <ul class="view-mode">
                                    <li class="active"><a href="shop-grid.html"><i
                                                class="fa fa-th-large"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @foreach($posts as $key => $post)
                            <div class="col-lg-4 col-md-6 col-12">
                                @include('frontend.posts.components.single', ['post' => $post])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('stylesheets')
    <script type='text/javascript'
            src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons'
            async='async'></script>
    <script type='text/javascript'
            src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons'
            async='async'></script>
    <style>
        #Gslider .carousel-inner {
            background: #000000;
            color: black;
        }

        #Gslider .carousel-inner {
            height: 550px;
        }

        #Gslider .carousel-inner img {

            width: 100%;
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

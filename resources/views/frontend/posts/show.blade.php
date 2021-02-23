@extends('frontend.frontend-layout')
@section('title', 'ban hang')
@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{route('fr.home')}}">Trang chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{route('fr.post.index')}}">{{$post->title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  <!-- End Breadcrumbs -->
    <!-- Product Style -->
    <!-- Breadcrumbs -->
    <div class="row">
        <div class="col-12">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3>{{$post->title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumbs -->  --}}
            <!-- Shop Single -->
            <section class="shop single section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="product-des">
                                        <div class="short">
                                            <h2>{{ $post->title }}</h2>
                                            <p class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {{$post->created_at->format('d M, Y. D')}}
                                        </div>
                                    </div>
                                    <div class="product-gallery">
                                        <div class="flexslider-thumbnails">
                                            <ul>
                                                <li data-thumb="images/bx-slider1.jpg"
                                                    rel="adjustX:10, adjustY:">
                                                    <img class="hover-img"
                                                         src="{{ asset('/uploads/images/posts/' . $post->image) }}"
                                                         alt="#">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                   
                                    <div class="content">
                                        @if($post->quote)
                                        <blockquote style="font-size:20px"> <i class="fa fa-quote-left"></i> {!! ($post->quote) !!}</blockquote>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="product-info">
                                        {!! $post->description !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    Tags:
                                    {!! $post->portal_tag_labels !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ End Shop Single -->
        </div>
    </div>
@endsection

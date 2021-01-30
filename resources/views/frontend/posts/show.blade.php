@extends('frontend.frontend-layout')
@section('title', 'ban hang')
@section('content')

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
            <!-- End Breadcrumbs -->
            <!-- Shop Single -->
            <section class="shop single section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
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
                                    <div class="product-des">
                                        <div class="short">
                                            <h4>{{ $post->title }}</h4>
                                        </div>
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

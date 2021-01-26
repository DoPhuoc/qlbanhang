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
                            <div class="bread-inner">
                                <ul class="bread-list">
                                    <li>
                                        <a href="{{ route('fr.post.index') }}">
                                            Bài viết<i
                                                class="ti-arrow-right"></i>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ route('fr.post.show', ['slug' => $post->slug, 'id' => $post->id]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
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
                                                         src="{{ asset('/uploads/images/products/' . $post->image) }}"
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

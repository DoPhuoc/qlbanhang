<div class="single-product">
    <div class="product-img">
        <a href="{{ route('fr.post.show', ['slug' => $post->slug, 'id' => $post->id]) }}">
            <img class="default-img"
                 src="{{asset('uploads/images/products')}}/{{$post->image}}"
                 alt="#">
            <img class="hover-img"
                 src="{{asset('uploads/images/products')}}/{{$post->image}}"
                 alt="#">
        </a>

        <div class="button-head">
            <div class="product-action-2">
                <input type="hidden"
                       value="{{ $post->id }}"
                       name="product_id">
                <a href="{{ route('fr.post.show', ['slug' => $post->slug, 'id' => $post->id]) }}"
                   class="bg-transparent border-0 mb-2 text-left">
                    {{$post->title}}
                </a>
            </div>
        </div>
    </div>
    <div class="product-content">
        <h3>
            <a href="{{ route('fr.post.show', ['slug' => $post->slug, 'id' => $post->id]) }}">
                {!! $post->brief_quote !!}
            </a>
        </h3>
    </div>
</div>
@push('javascripts')
    <script src="{{asset('frontend/js/active.js')}}"></script>
@endpush

@extends('layout.master')
@section('page-title')
Shop
@endsection
@section('main-content')

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>@yield('page-title')</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 col-sm-6">
                <div class="single-shop-product">
                    <div class="product-upper">
                        @if($product->mobile_img == 'No image found')
                        <img src="assets/img/no-image.png" width="263" height="323" alt="No image found" class="img-custom">
                        @else
                        <img src="/uploads/{{ $product->mobile_img }}" width="263" height="323" class="img-custom" alt="{{ $product->title }}">
                        <ins>{{ $product->price }}</ins>

                        @endif
                    </div>
                    <h2><a href="/product_detail/{{ $product->slug }}">{{ $product->title }}</a></h2>
                    <div class="product-carousel-price">
                        <ins>{{ $product->price }}</ins>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="product-pagination text-center">
                {{ $products->links() }}
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
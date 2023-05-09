
@extends('layout.master')
@section('page-title')
Home
@endsection
@section('main-content')
<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            @foreach($sliders as $slider)
            <li>
                @if($slider->brand_img == 'No image found')
                <img src="assets/img/no-image.png"  width="1400" height="770" alt="No image found">
                @else
                <img src="/uploads/{{ $slider->brand_img }}" width="1400" height="770" alt="{{ $slider->title }}">
                @endif
            </li>
            @endforeach
        </ul>
    </div>
    <!-- ./Slider -->
    </div> <!-- End slider area -->
    {{-- @empty --}}
    {{-- <div class="alert alert-danger">No record found!</div> --}}
    <!-- ./Slider -->
    </div> <!-- End slider area -->
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
        </div> <!-- End promo area -->
        
        
        <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <h2 class="section-title">Latest Products</h2>
                            <div class="product-carousel">
                                @foreach($products as $product)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        @if($product->mobile_img == 'No image found')
                                        <img src="assets/img/no-image.png" class="img-custom" alt="No image found">
                                        @else
                                        <img src="/uploads/{{ $product->mobile_img }}" class="img-custom" alt="{{ $product->title }}">
                                        @endif
                                        
                                    </div>
                                    
                                    <h2><a href="/product_detail/{{ $product->slug }}">{{ $product->title }}</a></h2>
                                    
                                    <div class="product-carousel-price">
                                        <ins>{{ $product->price }}</ins> <del>$100.00</del>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div> <!-- End main content area -->
            
            <div class="brands-area">
                <div class="zigzag-bottom"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="brand-wrapper">
                                <div class="brand-list">
                                    @foreach($brands as $brand)
                                   @if($brand->brand_img == 'No image found')
                                         <img src="assets/img/no-image.png" width="110" height="130" alt="No image found">
                                            @else
                                                <img src="/uploads/{{ $brand->brand_img }}" width="110" height="130" alt="{{ $brand->title }}">
                                                @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div> <!-- End brands area -->
                <div class="maincontent-area">
                    <div class="zigzag-bottom"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="latest-product">
                                    <h2 class="section-title">Popular Products</h2>
                                    <div class="product-carousel">
                                        @foreach($products_popular as $product_popular)
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                @if($product_popular->mobile_img == 'No image found')
                                                <img src="assets/img/no-image.png" class="img-custom" alt="No image found">
                                                @else
                                                <img src="/uploads/{{ $product_popular->mobile_img }}" class="img-custom" alt="{{ $product->title }}">
                                                @endif
                                                
                                            </div>
                                            
                                            <h2><a href="/product_detail/{{ $product_popular->slug }}">{{ $product_popular->title }}</a></h2>
                                            
                                            <div class="product-carousel-price">
                                                <ins>{{ $product_popular->price }}</ins> <del>$100.00</del>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div> <!-- End main content area -->
                    
                    
                    @endsection
@extends('layout.master')
@section('page-title')
Product Detail
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
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>
                
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    @foreach($recents_product as $recent_product)
                    <div class="thubmnail-recent">
                        @if($recent_product->mobile_img == 'No image found')
                            <img src="/assets/img/no-image.png" width="90" height="116" alt="No image found">
                            @else
                            <img src="/uploads/{{ $recent_product->mobile_img }}"width="90" height="116" alt="{{ $product->title }}">
                            @endif
                        <h2><a href="/product_detail/{{ $recent_product->slug }}">{{ $recent_product->title }}</a></h2>
                        <div class="product-sidebar-price">
                            <ins>{{ $recent_product->price }}</ins> <del>$100.00</del>
                        </div>
                    </div>
                        @endforeach
                </div>
                
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                    @foreach($recents_product as $recent_product)
                        <li>
                            <a href="">{{ $recent_product->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="/">Home</a>
                        <a href="/shop">{{ $product->title }}</a>
                        <a href="">{{ $product->price }}</a>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    @if($product->mobile_img == 'No image found')
                                    <img src="/assets/img/no-image.png" width="195" height="243" alt="No image found">
                                    @else
                                    <img src="/uploads/{{ $product->mobile_img }}" width="195" height="243" alt="{{ $product->title }}">
                                    @endif
                                </div> 
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name">{{ $product->title }} - 2015</h2>
                                <div class="product-inner-price">
                                    <ins>{{ $product->price }}</ins> <del>$100.00</del>
                                </div>
                
                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            {!! $product->description !!}
                                           
                                        </div>
                                       
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Related Products</h2>

                        <div class="related-products-carousel">
                        @foreach($relateds_product as $r_product)
                            <div class="single-product">
                                <div class="product-f-image">
                                    @if($r_product->mobile_img == 'No image found')
                                    <img src="/assets/img/no-image.png" width="195" height="243" alt="No image found">
                                    @else
                                    <img src="/uploads/{{ $r_product->mobile_img }}" width="195" height="243" alt="{{ $product->title }}">
                                    @endif
                                </div>
                                     <h2><a href="/product_detail/{{ $r_product->slug }}">{{ $r_product->title }}</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$400.00</ins>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('frontend.layouts.app')
@section('title')
| products
@stop
@section('content')
<!-- Header Banner -->
<!-- Header -->
<header class="banner-header valign bg-img" data-overlay-dark="1" data-background="{{ asset('storage/'.setting()->main_photo) }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 caption mt-90 animate-box" data-animate-effect="fadeInUp">
                <h1>Our Products</h1>
                <h5>See all our products</h5>
                <hr class="line line-hr-left-white">
            </div>
        </div>
    </div>
</header>
@if($products->count() > 0)
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-30">
                <h2 class="section-title">Our Products</h2> <span class="section-subtitle">Some Products</span>
                <hr class="line line-hr-left">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6" style="margin-bottom: 32px;">
                        <div class="product_item text-center">
                            <div class="pi_thumb">
                                <img src="{{ asset('storage/'.$product->photo) }}" style="height: 197px !important;width: 197px !important;" alt="Aftershave Cream">
                                <div class="pi_01_actions">
                                <a href="#" data-quantity="1" class="button product_type_simple sp-cart" data-product_id="415" data-product_sku="01" aria-label="Read more about “Aftershave Cream”" rel="nofollow"><i class="icofont-cart-alt"></i></a>                                    <a href="../product/aftershave-cream/index.html"><i class="icofont-eye"></i></a>
                                </div>        
                            </div>
                            <div class="pi_content">
                            <h6><a href="{{ route('front.product.show',['id'=>$product->id,'name'=>str_replace(' ', '_', $product->name)]) }}">{{ $product->name }}</a></h6>
                                <div class="product_price clearfix">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span>{{ $product->price }}</bdi></span></span>
                                </div>
                            </div>
                        </div>
                    </div>    
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 text-center animate-box" data-animate-effect="fadeInUp">
                        <!-- Pagination -->
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 style="text-align: center;">NO Products Found</h4>
                </div>
            </div>
        </div>
    </section>

@endif
@stop
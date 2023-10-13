@extends('frontend.layouts.app')
@section('style')
    <style>
        .about-home li
        {
            list-style: disc !important;
        }
    </style>
@endsection
@section('content')
 <!-- Slider -->
 <header class="header slider-fade">
    <div class="owl-carousel owl-theme">
        @foreach ($sliders as $slider )
        <div class="text-left item bg-img" data-overlay-dark="1" data-background="{{ asset('storage/'.$slider->photo) }}">
            <div class="v-middle caption mt-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="o-hidden">
                                <h1>{{ $slider->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
       
    </div>
</header>

<!-- About Us -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                <h2 class="section-title">About Us</h2>
                <span class="section-subtitle">{{ $about->title }}</span>
                <hr class="line line-hr-left">
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mb-60 animate-box about-home" data-animate-effect="fadeInUp">
                <h6>{{ $about->header }}</h6>
                <p>{!! $about->description !!}</p>
            </div>
            <div class="col-md-5 mb-60 animate-box" data-animate-effect="fadeInUp">
                <div class="betty-about-img">
                    <div class="img"> <img src="{{ asset('storage/'.$about->photo) }}" alt=""> </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
@if ($clients->count() > 0)
<section class="testimonials bg-img bg-fixed section-padding" data-overlay-light="2" data-background="{{ asset('frontend/img/testimonial.jpg') }}">
    <div class="container mt-30">
        <div class="row">
            <div class="section-head col-md-4">
                <h4>What our clients say about {{ setting()->sitename_en }}</h4>
                <p>Some customers' opinions about our services and products</p>
            </div>
            <div class="owl-carousel owl-theme col-md-7 offset-md-1">
                
                    @foreach ($clients as $client)
                    <div class="item-box"> 
                        <span class="quote">
                            <img src="img/quot.png" alt="">
                        </span>
                        <p>{{ $client->text }}</p>
                        <div class="info">
                            <div class="author-img"> <img src="{{ asset('storage/'.$client->photo) }}" alt=""> </div>
                            <div class="cont">
                                <h6>{{ $client->name }}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
            </div>
        </div>
    </div>
</section>
@endif

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
                                <a href="#" data-quantity="1" class="button product_type_simple sp-cart" data-product_id="415" data-product_sku="01" aria-label="Read more about “Aftershave Cream”" rel="nofollow"><i class="icofont-cart-alt"></i></a>
                                    <a href="../product/aftershave-cream/index.html"><i class="icofont-eye"></i></a>
                                </div>        
                            </div>
                            <div class="pi_content">
                            <h6><a href="#l">{{ $product->name }}</a></h6>
                                <div class="product_price clearfix">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>{{ $product->price }}</bdi></span></span>
                                </div>
                            </div>
                        </div>
                </div>    
                    @endforeach
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align: center;margin-top:40px">
                <a href="{{ route('front.products') }}">
                    <button class="btn-danger" style="border-radius: 26%;background: #48B757;border-color: #48B757;cursor: pointer">more</button>
                </a>
            </div>
        </div>
    </div>
</section>
@endif


<!-- Makeup -->
@if($Statistics->count() > 0)
<section class="betty-makeup section-padding light-pink-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-30">
                <h2 class="section-title">Statistics</h2> <span class="section-subtitle">Our Statistics</span>
                <hr class="line line-hr-left">
            </div>
        </div>
        <div class="row">
           
                @foreach ($Statistics as $Statistic )
                <div class="col-md-4">
                    <div class="betty-makeup-container">
                        <div class="betty-makeup-img-area"><span class="">{{ $Statistic->number }}</span></div>
                        <div class="betty-makeup-text-area">
                            <h4 class="betty-makeup-heading">{{ $Statistic->name }}</h4>
                            <p>{{ $Statistic->number }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            
        </div>
    </div>
</section>
@endif


@stop
@extends('frontend.layouts.app')
@section('title')
| about
@stop
@section('style')
  <style>
      .animate-box li{
          list-style: disc !important;
      }
  </style>
@endsection
@section('content')
<!-- Header Banner -->
<header class="banner-header valign bg-img" data-overlay-dark="1" data-background="{{ asset('storage/'.setting()->main_photo) }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 caption mt-90 animate-box" data-animate-effect="fadeInUp">
                <h1>About Us</h1>
                <h5>{{ $about->title }}</h5>
                <hr class="line line-hr-left-white">
            </div>
        </div>
    </div>
</header>
    <!-- About Us -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-60 animate-box" data-animate-effect="fadeInUp">
                <h6>{{ $about->header }}</h6>
                <p>{!! $about->description !!} </p>
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

@stop
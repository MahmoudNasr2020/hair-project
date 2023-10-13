@extends('frontend.layouts.app')
@section('title')
| services
@stop
@section('content')
 <!-- Header -->
 <header class="banner-header valign bg-img" data-overlay-dark="1" data-background="{{ asset('storage/'.setting()->main_photo) }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 caption mt-90 animate-box" data-animate-effect="fadeInUp">
                <h1>Our Services</h1>
                <h5>We offer a wide range of beauty services</h5>
                <hr class="line line-hr-left-white">
            </div>
        </div>
    </div>
</header>
<!-- Services -->
@if ($services->count() > 0)
    <section class="betty-services section-padding">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4">
                        <div class="item">
                            <div class="position-re o-hidden"> 
                                <img src="{{ asset('storage/'.$service->photo) }}" alt="" style="height: 234px !important;"> 
                            </div>
                            <div class="con">
                                <a href="#">
                                    <h5>{{ $service->title }} <i class="fas fa-arrow-right"></i></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@else
    <section class="betty-services section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 style="text-align: center;">NO Services Found</h4>
                </div>
            </div>
        </div>
    </section>
@endif

@stop
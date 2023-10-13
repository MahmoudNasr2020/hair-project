@extends('frontend.layouts.app')
@section('title')
| products
@stop
@section('content')
<!-- Header Banner -->
 <!-- Header -->
 <header class="banner-header valign bg-img" data-overlay-dark="1" data-background="{{ asset('storage/'.setting()->main_photo) }}"></header>
 <!-- Post -->
 <section class="section-padding">
     <div class="container">
         <div class="row">
             <div class="col-md-12 mb-30 animate-box" data-animate-effect="fadeInUp">
                 <h2 class="section-title">{{ $product->name }}</h2>
                 <span class="section-subtitle">{{ $product->price }} </span>
                 <hr class="line line-hr-left">
             </div>
         </div>
         <div class="row">
             <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                 <p>{!! $product->description  !!}</p>
                
             </div>
         </div>
         <!-- Gallery -->
         <div class="row betty-photos mt-30" id="betty-section-photos">
             <div class="col-md-12">
                 <a href="" class="d-block betty-photo-item" data-caption="Top 5 Benefits of Body Polishing" data-fancybox="gallery"> 
                     <img src="{{ asset('storage/'.$product->photo) }}" alt="Image" class="img-fluid">
                     <div class="photo-text-more"> <span class="ti-fullscreen"></span> </div>
                 </a>
             </div>
  
         </div>
        
     </div>
 </section>
@stop

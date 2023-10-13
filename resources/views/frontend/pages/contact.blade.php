@extends('frontend.layouts.app')
@section('title')
| contact
@stop
@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@stop
@section('content')
 <!-- Header -->
 <header class="banner-header valign bg-img" data-overlay-dark="1" data-background="{{ asset('storage/'.setting()->main_photo) }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 caption mt-90 animate-box" data-animate-effect="fadeInUp">
                <h1>Contact Us</h1>
                <h5>How to find {{ setting()->sitename_en }}</h5>
                <hr class="line line-hr-left-white">
            </div>
        </div>
    </div>
</header>
<!-- Contact -->
<section class="section-padding">
    <div class="container">
        <div class="row mb-60">
            <!-- Contact Info -->
            <div class="col-md-5 mb-30 animate-box" data-animate-effect="fadeInUp">
                <h6>Contact Info</h6>
                <div class="betty-contact-info2">
                    <div class="feat-inner2"> <i class="fa fa-phone" style="margin-right: 8px;top: -17px;position: relative;"></i>
                        <div class="feat-info2" style="display: inline-block;">
                            <h5>Phone Text</h5>
                            <h6>{{ setting()->phone_number }}</h6>
                            @if (setting()->phone_number_2 != '')
                                <h6>{{ setting()->phone_number_2 }}</h6>
                            @endif
                            @if (setting()->phone_number_3 != '')
                                <h6>{{ setting()->phone_number_3 }}</h6>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="betty-contact-info2">
                    <div class="feat-inner2"> <i class="fas fa-envelope-open-text" style="margin-right: 8px;top: -17px;position: relative;"></i>
                        <div class="feat-info2" style="display: inline-block;">
                            <h5>E-Mail</h5>
                            <h6>{{ setting()->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Form -->
            <div class="col-md-7 animate-box" data-animate-effect="fadeInUp">
                <h6>Contact Form</h6>
                <form method="post" class="row" id="contact_form">
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" placeholder="Full Name">
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" id="email" placeholder="Email" required="">
                    </div>
                    <div class="col-md-12">
                        <textarea name="message" id="message" cols="40" rows="4" placeholder="Message"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button class="butn-dark mt-10" id="submit_button" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@stop

@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @include('frontend.pages.contact_ajax')
@endsection
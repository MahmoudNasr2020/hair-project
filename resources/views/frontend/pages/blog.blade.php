@extends('frontend.layouts.app')
@section('title')
| blog
@stop
@section('content')
<!-- Header Banner -->
<!-- Header -->
<header class="banner-header valign bg-img" data-overlay-dark="1" data-background="{{ asset('storage/'.setting()->main_photo) }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 caption mt-90 animate-box" data-animate-effect="fadeInUp">
                <h1>Our News</h1>
                <h5>Read about the latest news</h5>
                <hr class="line line-hr-left-white">
            </div>
        </div>
    </div>
</header>
<!-- Blog  -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-md-8">
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-12 animate-box" data-animate-effect="fadeInUp">
                            <div class="blog-entry">
                                <a href="#" class="blog-img"><img src="{{ asset('storage/'.$blog->photo) }}" class="img-fluid" alt=""></a>
                                <div class="desc"> <span>{{ $blog->created_at->format('d-m-Y') }}</span>
                                    <h3><a href="{{ route('front.blog.show',['id'=>$blog->id,'title'=>str_replace(' ', '_', $blog->title)]) }}">{{ $blog->title }}</a></h3>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12 text-center animate-box" data-animate-effect="fadeInUp">
                        <!-- Pagination -->
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="betty-sidebar-part animate-box" data-animate-effect="fadeInUp">
                    <div class="betty-sidebar-block betty-sidebar-block-categories">
                        <div class="betty-sidebar-block-title"> pages </div>
                        <div class="betty-sidebar-block-content">
                            <ul class="ul1">
                                <li><a href="{{ route('front.home') }}">home</a></li>
                                <li><a href="{{ route('front.about') }}">about</a></li>
                                <li><a href="{{ route('front.products') }}">products</a></li>
                                <li><a href="{{ route('front.contact') }}">contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="betty-sidebar-block betty-sidebar-block-latest-posts">
                        <div class="betty-sidebar-block-title"> Latest Posts </div>
                        <div class="betty-sidebar-block-content">
                            @foreach ($latest_blogs as $latest_blog)
                                <div class="latest">
                                    <a href="{{ route('front.blog.show',['id'=>$latest_blog->id,'title'=>str_replace(' ', '_', $latest_blog->title)]) }}" class="clearfix">
                                        <div class="txt1">{{ $latest_blog->title }}</div>
                                        <div class="txt2">{{ $latest_blog->created_at->format('d-m-Y') }}</div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@stop
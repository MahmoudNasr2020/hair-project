 <!-- Loading -->
 <div class="loading">
    <div class="text-center middle">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper valign">
            <div class="logo">
                <h2><a href="#">{{ setting()->sitename_en }}</a></h2>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="icon-bar"><i class="fas fa-bars"></i></span> 
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link {{ request()->segment(1)== ''?'active' :'' }}" href="{{ route('front.home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->segment(1)== 'about'?'active' :'' }}" href="{{ route('front.about') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->segment(1)== 'products'?'active' :'' }}" href="{{ route('front.products') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->segment(1)== 'blog'?'active' :'' }}" href="{{ route('front.blog') }}">Blogs</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->segment(1)== 'contact'?'active' :'' }}" href="{{ route('front.contact') }}">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
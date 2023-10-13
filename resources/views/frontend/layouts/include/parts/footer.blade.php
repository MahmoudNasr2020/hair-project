   <!-- Footer -->
   <footer class="main-footer dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-30">
                <div class="item abot">
                    <div class="logo mb-20">
                        <h2><a href="#">{{ setting()->sitename_en }}</a></h2>
                    </div>
                    <div class="social-icon">
                        <a href="{{ setting()->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ setting()->instagram }}"><i class="fab fa-instagram"></i></a>
                        <a href="{{ setting()->twitter }}"><i class="fab fa-twitter"></i></a>
                        <a href="{{ setting()->youtube }}"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 mb-30">
                <div class="item usful-links">
                    <div class="fothead">
                        <h6>Useful Links</h6>
                    </div>
                    <ul>
                        <li><i class="fas fa-arrow-right"></i> <a href="{{ route('front.about') }}">about</a></li>
                        <li><i class="fas fa-arrow-right"></i> <a href="{{ route('front.blog') }}">blogs</a></li>
                        <li><i class="fas fa-arrow-right"></i> <a href="{{ route('front.products') }}">products</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 mb-30">
                <div class="item fotcont">
                    <div class="fothead">
                        <h6>Get in touch</h6>
                    </div>
                    <p>{{ setting()->phone_number  }}</p>
                    <p>{{ setting()->email  }}</p>
                    <p><i class="fas fa-arrow-right" style="font-size: 7px;"></i> <a href="{{ route('front.contact') }}">contact Us</a></p>

                </div>
            </div>
           
        </div>
    </div>

</footer>
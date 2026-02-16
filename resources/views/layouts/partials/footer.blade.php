<!-- section-->
<section class="dark-bg2 small-padding order-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Ready To order Your Project ?</h3>
            </div>
            <div class="col-md-4"><a href="{{ route('contact') }}" class="btn flat-btn color-btn">Get In Touch</a>
            </div>
        </div>
    </div>
</section>
<!-- section end-->
<!-- footer-->
<div class="height-emulator fl-wrap"></div>
<footer class="main-footer fixed-footer">
    <!--footer-inner-->
    <div class="footer-inner fl-wrap">
        <div class="container">
            <div class="partcile-dec" data-parcount="90"></div>
            <div class="row">
                <div class="col-md-2">
                    <div class="footer-title fl-wrap">
                        <span>Trimatric</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-header"><img style="height: 100px; weight:250px" src="{{ $siteSetting['logo'] ?? '' }}" alt="" class="img-responsive"></div>
                    <div class="footer-contacts fl-wrap">
                        <ul>
                            <li><i class="fal fa-phone"></i><span>Phone :</span><a href="tel:{{ $siteSetting['phone'] ?? '' }}">{{ $siteSetting['phone'] ?? '' }}</a></li>
                            <li><i class="fal fa-envelope"></i><span>Email :</span><a href="mailto:{{ $siteSetting['email'] ?? '' }}">{{ $siteSetting['email'] ?? '' }}</a></li>
                            <li><i class="fal fa-map-marker"></i><span>Address :</span><a href="https://goo.gl/maps/GhANBiCa1pT2BwCh8" class="address">{{ $siteSetting['address'] ?? '' }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="footer-header fl-wrap"> Links</div>
                    <!-- footer-box-->
                    <div class="footer-box fl-wrap">
                        <!-- footer-socilal -->
                        <ul class="scroll-init footer-links">
                            <li><a className="btn float-btn trsp-btn" href="{{route('home')}}">Home</a></li>
                            <li><a className="btn float-btn trsp-btn" href="{{route('home')}}#sec2">About</a></li>
                            <li><a className="btn float-btn trsp-btn" href="{{route('home')}}#sec3">Services</a></li>
                            <li><a className="btn float-btn trsp-btn" href="#">Projects</a></li>
                            <li><a className="btn float-btn trsp-btn" href="#">Clients</a></li>
                        </ul>
                        <!-- footer-socilal end -->
                        <!-- footer-socilal -->
                        <div class="footer-socilal fl-wrap">
                            <ul >
                                <li><a href="{{ $siteSetting['fb_link'] ?? '' }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $siteSetting['linkedin_link'] ?? '' }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="{{ $siteSetting['x_link'] ?? '' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                        <!-- footer-socilal end -->
                    </div>
                    <!-- footer-box end-->
                </div>
                <div class="col-md-4">
                    <div class="footer-header fl-wrap">Sister Concerns</div>
                    <div class="footer-header">
                        <a href="https://indecor.com.bd/"><img style="height: 50px" src="{{asset('assets/images/Indecor.png')}}" alt="Indecor" class=""></a>
                        <a href="https://trimatric.ai/"><img style="height: 50px" src="{{asset('assets/images/trimatricai.png')}}" alt="Trimatric Ai" class=""></a>
                        <br><br>
                        <a href="https://www.satez.com.bd/"><img style="height: 50px" src="{{asset('assets/images/satez.png')}}" alt="Satez" class=""></a>
                        <a href="https://www.futurebangladesh.org/"><img style="height: 50px" src="{{asset('assets/images/ftb.png')}}" alt="Future Bangladesh" class=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-inne endr-->
    <!--subfooter-->
    <div class="subfooter fl-wrap">
        <div class="container">
            <!-- policy-box-->
            <div class="policy-box">
                <span>&#169; Trimatric <script type="text/javascript"> document.write(new Date().getFullYear());</script> /  All rights reserved. </span>
            </div>
            <!-- policy-box end-->
            <a href="#" class="to-top color-bg"><i class="fal fa-angle-up"></i><span></span></a>
        </div>
    </div>
    <!--subfooter end-->
</footer>
<!-- footer end-->

<!-- hero-wrap-->
    <div class="hero-wrap" id="sec1" data-scrollax-parent="true">
        <!-- hero-inner-->
        <!-- fullscreen-slider-wrap-->
        <div class="slider-carousel-wrap full-height fullscreen-slider-wrap">
            <div class="fullscreen-slider full-height cur_carousel-slider-container fl-wrap" data-slick='{"autoplay": true, "autoplaySpeed": 4000 , "pauseOnHover": false}'>
                @foreach ($sliders as $slider)
                <!-- fullscreen-slider-item-->
                <div class="fullscreen-slider-item full-height fl-wrap">
                    <div class="bg par-elem"  data-bg="{{ $slider['image'] }}"></div>
                    <div class="overlay"></div>
                    <div class="half-hero-wrap">
                        <h1>{{ $slider['title'] }}<br><span> {{ $slider['subtitle'] }} </span></h1>
                        <h4>{{ $slider['details'] }}</h4>
                        <div class="clearfix"></div>
                        <a href="#sec2" class="custom-scroll-link btn float-btn flat-btn color-btn mar-top">Let's Start</a>
                    </div>
                </div>
                <!-- fullscreen-slider-item end-->
                @endforeach
            </div>
            <div class="sp-cont   sp-cont-prev"><i class="fal fa-arrow-left"></i></div>
            <div class="sp-cont   sp-cont-next"><i class="fal fa-arrow-right"></i></div>
            <div class="fullscreenslider-counter"></div>
        </div>
        <!-- fullscreen-slider-wrap end-->
        <!--hero dec-->
        <div class="hero-decor-numb"><span>23.74758041012331  </span><span>90.40968727351061 </span> <a href="https://maps.app.goo.gl/aKAW4D1x5ncfCLSv6" target="_blank" class="hero-decor-numb-tooltip">Based In Dhaka</a></div>
    </div>
<!-- hero-wrap end-->

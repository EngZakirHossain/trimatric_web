@extends('layouts.master')
@section('title', 'Home')
@section('topmenu')
    @include('layouts.partials.topmenu')
@endsection

@section('slider')
    @include('layouts.partials.slider')
@endsection

@section('content')

    <!-- section-->
    <section data-scrollax-parent="true" id="sec2">
        <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }"><span>//</span>About Us
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="details-wrap fl-wrbg par-elemap pb-50">
                        <h3>About <span>Us</span></h3>
                        <div class="clearfix"></div>
                        <p style="font-size: 14px" class="text-justify wow fadeInUp" data-wow-duration="1s"
                            data-wow-delay=".3s">
                            <b class="text-blue">TRIMATRIC Architect and Engineers</b>, established in the year
                            2007, is one of the pioneer concerns in the field of
                            creative solution providers in residential and commercial design, capable of excellent
                            imaginative ability and
                            professionalism. We bring out the hidden persona of our clients analyzing their demands
                            and choices that eventually
                            satisfy their inexpressible needs. We look forward not only to seeking business
                            opportunities but also to providing
                            innovative, unique and outstanding perspectives for the ful¬fillment of the requirements
                            of our clients.
                        </p>
                    </div>

                    <div class="row">

                        <div class="col-md-5">
                            <div class="about-slider fl-wrap">
                                @foreach(['mission.jpg','vision.jpg','philosophy.jpg'] as $img)
                                    <div>
                                        <img src="{{ asset('assets/images/'.$img) }}" class="respimg" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="fl-wrap pr-list-det wow fadeInLeft " data-wow-duration="1s"
                                    data-wow-delay=".6s">
                                <h3 class="text-blue text-bold f16">Our Mission</h3>
                                <p>" Our mission is to satisfy our valuable customers ensuring quality of products
                                    and service excellences at a reasonable
                                    price, respect the social norms & customs, contribute to the employment
                                    generation of the country, endeavor for
                                    constant enhancement of technical and professional skills of our people and
                                    contribute in our national economy. "</p>
                            </div>

                            <div class="fl-wrap pr-list-det wow fadeInRight" data-wow-duration="1s"
                                    data-wow-delay=".8s">
                                <h3 class="text-blue text-bold f16">Our Vision</h3>
                                <p>" Our vision is to nourish livable mind through heart touching unconventional
                                    design, create employment for our country
                                    people and leave a colorful & glorious ambiance for our next generation. "</p>
                                <br>
                            </div>
                            <div class="fl-wrap pr-list-det wow fadeInUpBig" data-wow-duration="1s"
                                    data-wow-delay="1s">
                                <h3 class="text-blue text-bold f16">Our Philosophy</h3>
                                <p>" Innovation we create, Excellence we believe”, Inspired by this moto, TRIMATRIC
                                    is always keenly devoted to bring out the ultimate satisfaction of our
                                    customers. With vision of sophisticated designs coupled with durable technical
                                    detailing, TRIMATRIC enjoys producing Spaces ranging from small scale retail
                                    extensions to Palatial Residences and exclusively 5-star Hospitality projects.
                                    We compose sensual spaces that inspires, engages, intuitively evokes a sense of
                                    place & timeless elegance. The purpose & Nature of the architecture may vary,
                                    but these visions remain constant to our philosophy. "</p><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-parallax-module" data-position-top="90" data-position-left="25"
                data-scrollax="properties: { translateY: '-250px' }"></div>
        <div class="bg-parallax-module" data-position-top="70" data-position-left="70"
                data-scrollax="properties: { translateY: '150px' }"></div>
        <div class="sec-lines"></div>
    </section>
    <!-- section end-->
    <!-- section-->
    <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
        <div class="bg par-elem" data-bg="{{ asset('assets/images/aboutUs.jpg') }}"
            data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>

        <div class="container">
            <div class="section-title wow fadeInUp">
                <h2>Some Interesting <span>Facts</span> <br> About Us</h2>
                <div class="horizonral-subtitle"><span>Numbers</span></div>
            </div>

            <div class="fl-wrap facts-holder">
                @php
                    $facts = [
                        ['number' => 15, 'label' => 'Years of Experience'],
                        ['number' => 300, 'label' => 'Team Members'],
                        ['number' => 450, 'label' => 'Satisfied Clients'],
                        ['number' => 1000, 'label' => 'Projects'],
                    ];
                @endphp

                @foreach($facts as $fact)
                    <div class="inline-facts-wrap wow fadeInUp">
                        <div class="inline-facts">
                            <div class="text-center">
                                <h3 style="font-size:32px; font-weight:700; color:white">
                                    {{ $fact['number'] }}+
                                </h3>
                            </div>

                            <h6>{{ $fact['label'] }}</h6>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- section end-->
    <!-- section-->
    <section data-scrollax-parent="true" id="sec3">
        <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }"
                style="transform: translateZ(0px) translateY(-123.439px); font-size: 209.765px;"><span>//</span>Our
            Services
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-about fl-wrap">
                        <!-- section-title -->
                        <div class="section-title fl-wrap wow fadeIn">
                            <!-- <h3></h3> -->
                            <h2>Our <span> Services</span></h2>
                        </div>
                        <!-- features-box-container -->
                        <div class="features-box-container fl-wrap">
                            @foreach(collect($services)->chunk(3) as $serviceRow)
                                <div class="row">
                                    @foreach($serviceRow as $service)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12 features-box wow fadeInUp"
                                            data-wow-duration="1s"
                                            data-wow-delay=".2s">

                                            <div class="time-line-icon text-center">
                                                <img src="{{ $service['icon'] }}"
                                                    class="img-fluid"
                                                    width="50">
                                            </div>

                                            <h3>{{ $service['title'] }}</h3>
                                            <p>{{ $service['description'] ?? '--' }}</p>

                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="bg-parallax-module" data-position-top="90" data-position-left="25"
                data-scrollax="properties: { translateY: '-250px' }"
                style="transform: translateZ(0px) translateY(-123.439px); top: 90%; left: 25%;"></div>
        <div class="bg-parallax-module" data-position-top="70" data-position-left="70"
                data-scrollax="properties: { translateY: '150px' }"
                style="transform: translateZ(0px) translateY(74.0636px); top: 70%; left: 70%;"></div>
        <div class="sec-lines">
            <div class="container full-height">
                <div class="line-item"></div>
                <div class="line-item"></div>
                <div class="line-item"></div>
                <div class="line-item"></div>
                <div class="line-item"></div>
            </div>
        </div>
    </section>
    <!-- section end-->

    <!--section -->
    <section class="dark-bg" id="sec4">

        <div class="fet_pr-carousel-title">
            <div class="fet_pr-carousel-title-item">
                <h3>Featured Projects</h3>
                <p> Some of our featured projects. Click View All to see all selected projects</p>
                <a href="{{route('projects.list')}}" class="btn float-btn flat-btn color-btn mar-top">View
                    All</a>
            </div>
        </div>
        <!--slider-carousel-wrap -->
        <div class="slider-carousel-wrap fl-wrap">
            <!--fet_pr-carousel -->
            <div class="fet_pr-carousel cur_carousel-slider-container fl-wrap">
                <!--slick-item -->
                @foreach($projects as $project)
                    <div class="slick-item">
                        <div class="fet_pr-carousel-box">
                            <div class="fet_pr-carousel-box-media fl-wrap">
                                <a href="{{route('project.details',$project['slug'])}}">
                                    <img src="{{$project['cover_image']}}" class="respimg" alt="">
                                </a>
                            </div>
                            <div class="fet_pr-carousel-box-text fl-wrap">
                                <h3>
                                    <a href="{{route('project.details',$project['slug'])}}">{{$project['title']}}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--fet_pr-carousel end -->
            <div class="sp-cont sp-arr sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
            <div class="sp-cont sp-arr sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
        </div>
        <!--slider-carousel-wrap end-->
        <div class="fet_pr-carousel-counter"></div>
    </section>
    <!-- section end -->

    <!--section -->
    <section data-scrollax-parent="true" id="sec5">

        <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">Our
            Clients<span>//</span></div>
        <div class="container">
            <div class="section-title fl-wrap">
                <h2>Our <span>Clients</span></h2>
                <a href="{{route('clients.list')}}" class="btn float-btn flat-btn color-btn">Client List</a>
            </div>
        </div>
        <div class="clearfix"></div>

        <!-- client-list -->
        <div class="fl-wrap">
            <div class="container">
                <ul class="client-slider">
                    @foreach($clients as $client)
                        <li>
                            <a href="javascript:void(0);">
                                <img width="50%" height="50%" src="{{ $client['logo'] }}" alt="{{ $client['name'] }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!-- section end -->
@endsection
@section('script')
<script>
$(document).ready(function(){
    $('.about-slider').slick({
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: false,
        dots: true,
        adaptiveHeight: true
    });

    $('.client-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        responsive: [
            { breakpoint: 1200, settings: { slidesToShow: 4 } },
            { breakpoint: 992, settings: { slidesToShow: 3 } },
            { breakpoint: 768, settings: { slidesToShow: 2 } },
            { breakpoint: 480, settings: { slidesToShow: 1 } }
        ]
    });
});

</script>

@endsection

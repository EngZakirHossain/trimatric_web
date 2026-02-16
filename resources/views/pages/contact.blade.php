@extends('layouts.master')
@section('title', 'Contact Us')
@section('content')
    <!-- Content-->
    <div class="content">
        @include('layouts.partials.breadcrumb')
        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem"  data-bg="{{asset('assets/images/contact_us.webp')}}" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="pattern-bg"></div>
            <div class="container">
                <div class="section-title">
                    <h2><span>Contact </span>  Us</h2>
                    <p> For any query, feel free to contact with us. </p>
                    <div class="horizonral-subtitle"><span>Contacts</span></div>
                </div>
            </div>
            <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
        </section>
        <!-- section end-->
        <!-- section end-->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle"  data-scrollax="properties: { translateY: '-250px' }" >Get in Touch<span>//</span></div>
            <div class="container">
                <!-- contact details -->
                <div class="fl-wrap   mar-bottom">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="pr-title fl-wrap">
                                <h3>Contact  Details</h3>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- features-box-container -->
                            <div class="features-box-container single-serv fl-wrap">
                                <div class="row">
                                    <!--features-box -->
                                    <div class="features-box col-md-4">
                                        <div class="time-line-icon">
                                            <i class="fal fa-mobile-android"></i>
                                        </div>
                                        <h3>01. Phone</h3>
                                        <a href="tel:{{ $siteSetting['phone'] ?? '' }}">{{ $siteSetting['phone'] ?? '' }}</a>
                                    </div>
                                    <!-- features-box end  -->
                                    <!--features-box -->
                                    <div class="features-box col-md-4">
                                        <div class="time-line-icon">
                                            <i class="fal fa-compass"></i>
                                        </div>
                                        <h3>02. Location</h3>
                                        <a href="https://maps.app.goo.gl/aKAW4D1x5ncfCLSv6" target="_blank">{{ $siteSetting['address'] ?? '' }}</a>
                                    </div>
                                    <!-- features-box end  -->
                                    <!--features-box -->
                                    <div class="features-box col-md-4">
                                        <div class="time-line-icon">
                                            <i class="fal fa-envelope-open"></i>
                                        </div>
                                        <h3>03. Email</h3>
                                        <a href="mailto:{{ $siteSetting['email'] ?? '' }}">{{ $siteSetting['email'] ?? '' }}</a>
                                    </div>
                                    <!-- features-box end  -->
                                </div>
                            </div>
                            <!-- features-box-container end  -->
                        </div>
                    </div>
                </div>
                <!-- contact details end  -->
                <div class="fw-map-container fl-wrap mar-bottom">
                    <div class="map-container">
{{--                         <div id="singleMap" data-latitude="23.7470099" data-longitude="90.4060213" data-mapTitle="Out Location"></div>--}}
                         <div>
                        <iframe id="singleMap"  data-mapTitle="Out Location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.0103620939212!2d90.40672941854262!3d23.747009894821797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b88931a8211d%3A0x494f9016bdd180c9!2sTrimatric%20Architects%20%26%20Engineers!5e0!3m2!1sen!2sbd!4v1622715021313!5m2!1sen!2sbd"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                         </div>
                    </div>
                </div>
                <!--  map end  -->
                <div class="fl-wrap mar-top">
                    <div class="row">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <div class="col-md-3">
                            <div class="pr-title fl-wrap">
                                <h3>Get In Touch</h3>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div id="contact-form">
                                <div id="message"></div>
                                <form  class="custom-form" action="#" method="post">
                                    @csrf
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><i class="fal fa-user"></i></label>
                                                <input type="text" name="name" id="name" placeholder="Your Name *" value="" required=""/>
                                            </div>
                                            <div class="col-md-6">
                                                <label><i class="fal fa-envelope"></i> </label>
                                                <input type="text"  name="email" id="email" placeholder="Email Address *" value="" required=""/>
                                            </div>
                                            <div class="col-md-6">
                                                <label><i class="fal fa-mobile-android"></i> </label>
                                                <input type="text"  name="phone" id="phone" placeholder="Phone *" value="" required="" />
                                            </div>
                                            <div class="col-md-6">
                                                <select name="subject" id="subject" class="chosen-select sel-dec">
                                                    <option value="Order Project">Project</option>
                                                    <option value="Support">3D Design</option>
                                                    <option value="Other Question">Other Question</option>
                                                </select>
                                            </div>
                                        </div>
                                        <textarea name="message"  id="message" cols="40" rows="3" placeholder="Your Message:"></textarea>
                                        <div class="clearfix"></div>
                                        <button class="btn float-btn flat-btn color-btn" type="submit" id="submit">Send Message</button>
                                        <div id="loader"></div>
                                    </fieldset>
                                </form>
                            </div>
                            <!-- contact form  end-->
                        </div>

                    </div>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="70"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
            <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
            <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
            <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->
@endsection

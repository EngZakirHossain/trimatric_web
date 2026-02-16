@extends('frontend.master')

@section('title')
    Circular - {{$circulars->title}}
@endsection

@section('class')
    class="single-page-wrap"
@endsection

@section('content')
    <!-- Content-->
    <div class="content">
        <div class="single-page-decor"></div>
        <div class="single-page-fixed-row">
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down</span>
            </div>
            <a href="{{route('index')}}" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to home</span></a>
        </div>
        <!-- section -->
        <section data-scrollax-parent="true" id="sec1">
            <div class="container">
                <!-- blog-container  -->
                <div class="fl-wrap post-container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- post -->
                            <div class="post fl-wrap fw-post">
                                <h2><span>{{$circulars->title}}</span></h2>
                                <div class="blog-text fl-wrap">
                                    <div class="clearfix"></div>
                                    <h3>Designation: {{$circulars->title}}</h3>
                                    <h3>vacancy: {{$circulars->vacancy}}</h3>
                                    <h3>Job Type: {{$circulars->type}}</h3>
                                    <h3>Salary: {{$circulars->salary}}</h3>
                                    {!! html_entity_decode($circulars->details) !!}
                                </div>
                            </div>
                           <!-- post end-->
                        </div>
                        <div class="limit-box fl-wrap"></div>


                        <div id="contact-form">
                            <div class="pr-bg pr-bg-white"></div>
                            <div id="message">
                                @if (Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                            </div>
                            <form class="custom-form" action="{{route('cv-upload.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <fieldset class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="name" id="name" placeholder="Your Name *" required=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" id="phone" placeholder="Phone *" required=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" id="email" placeholder="Email Address *" required=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="position" id="position" placeholder="Job Title *" value="{{$circulars->title}}" required=""/>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea id="description" name="description" cols="40" rows="3" placeholder="Tell Us About Yourself : (optional)"></textarea>
                                        </div>
                                        <div class="col-md-12 " style="text-align: left; margin-top: 20px">
                                            <label for="exampleFormControlFile1">Upload Your CV: </label><br>
                                            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1" required="">
                                        </div>
                                    </div>

                                    <button class="btn float-btn flat-btn color-bg" type="submit" id="submit">Submit
                                        <i class="fal fa-long-arrow-right"></i>
                                    </button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- blog-container end    -->
            </div>
            <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
            <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
            <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
            <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->

        <!-- section-->
        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Ready To order Your Project ?</h3>
                    </div>
                    <div class="col-md-4"><a href="{{route('contact')}}" class="btn flat-btn color-btn">Get In Touch</a> </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->
@endsection

@section('js')

@endsection

@section('css')

@endsection

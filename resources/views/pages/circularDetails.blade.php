@extends('layouts.master')
@section('title', $jobDetails['title'] ?? 'Circular Details')

@section('content')
    <!-- Content-->
        <div class="single-page-decor"></div>
        @include('layouts.partials.breadcrumb')
        <!-- section -->
        <section data-scrollax-parent="true" id="sec1">
            <div class="container">
                <!-- blog-container  -->
                <div class="fl-wrap post-container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- post -->
                            <div class="post fl-wrap fw-post">
                                <h2><span>{{$jobDetails['title']}}</span></h2>
                                <div class="blog-text fl-wrap">
                                    <div class="clearfix"></div>
                                    <h3>Designation: {{$jobDetails['title']}}</h3>
                                    <h3>vacancy: {{$jobDetails['vacancy']}}</h3>
                                    <h3>Job Type: {{$jobDetails['type']}}</h3>
                                    <h3>Salary: {{$jobDetails['salary']}}</h3>
                                    {!! html_entity_decode($jobDetails['description']) !!}
                                </div>
                            </div>
                           <!-- post end-->
                        </div>
                        <div class="limit-box fl-wrap"></div>


                        <div id="contact-form">
                            <div class="pr-bg pr-bg-white"></div>
                            <form class="custom-form" action="{{route('circular.apply', ['slug' => $jobDetails['slug']])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <fieldset class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="name" placeholder="Your Name *" required=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" placeholder="Phone *" required=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" placeholder="Email Address *" required=""/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="subject" placeholder="Job Title *" value="{{$jobDetails['title']}}" required=""/>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea id="description" name="description" cols="40" rows="3" placeholder="Tell Us About Yourself : (optional)"></textarea>
                                        </div>
                                        <div class="col-md-12 " style="text-align: left; margin-top: 20px">
                                            <label for="exampleFormControlFile1">Upload Your CV: </label><br>
                                            <input type="file" name="cv" class="form-control" required>
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
    <!-- Content end -->
@endsection

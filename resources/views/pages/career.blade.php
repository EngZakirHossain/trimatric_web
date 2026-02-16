@extends('frontend.master')

@section('title')
    CAREER
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
        <!-- section-->
        <section class="dark-bg no-padding">
            <div class="hidden-info-wrap-bg">
                <div class="bg-ser">
                </div>
                <div class="overlay"></div>
            </div>
            <!--   hidden-info-wrap -->
            <div class="hidden-info-wrap">
                <div class="hidden-info fl-wrap">
                    <div class="hidden-info-title">Job Circular</div>
                    <div class="hidden-works-list fl-wrap">
                        <!--   hidden-works-item -->
                        @foreach( $careers as $key=>$row)
                            @if($row->status=='Active')
                                <div class="hidden-works-item  serv-works-item fl-wrap" data-bgscr="{{asset('frontend/images/bg/long/1.png')}}">
                                    <div class="hidden-works-item-text">
                                        <h3><a href="{{route('circular',[$row->title])}}">{{$row->title}}</a></h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p>Vacancy: {{$row->vacancy}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Deadline: {{$row->date}}</p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="serv-icon"><i class="fas fa-briefcase"></i></div>
                                    </div>
                                    <div class='hidden-works-item-dec'>
                                        <a href="{{route('circular',[$row->title])}}">
                                            <button class="btn flat-btn color-btn">
                                                Apply Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="hidden-works-item  serv-works-item fl-wrap" data-bgscr="{{asset('frontend/images/bg/long/1.png')}}">

                                </div>
                            @endif

                        @endforeach
                        <!--   hidden-works-item end -->
                    </div>
                </div>
            </div>
            <!-- hidden-info-wrap end -->
            <div class="fl-wrap limit-box"></div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Ready to Work With Us ?</h3>
                    </div>
                    <div class="col-md-4"><a href="{{route('contact')}}" class="btn flat-btn color-btn">Get In Touch</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->
@endsection

@extends('layouts.master')
@section('title', 'Circulars')
@section('content')
    <div class="content">
    @include('layouts.partials.breadcrumb')
    <!-- section-->
    <section class="dark-bg">
        <div class="hidden-info-wrap-bg">
            <div class="bg-ser">
            </div>
            <div class="overlay"></div>
        </div>
        <!--   hidden-info-wrap -->
        <div class="hidden-info-wrap">
            <div class="hidden-info fl-wrap">
                <div class="hidden-info-title">Job Circulars</div>
                <div class="hidden-works-list fl-wrap">
                    <!--   hidden-works-item -->
                    <div class="hidden-works-item  serv-works-item fl-wrap" data-bgscr="{{asset('assets/images/vacancy.png')}}">
                        @foreach( $jobs as $job)
                            <div class="hidden-works-item-text">
                                <h3><a href="{{route('circular.details',[$job['slug']])}}">{{$job['title']}}</a></h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Vacancy: {{$job['vacancy']}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Deadline: {{$job['deadline']}}</p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="serv-icon"><i class="fas fa-briefcase"></i></div>
                            </div>
                            <div class='hidden-works-item-dec'>
                                <a href="{{route('circular.details',[$job['slug']])}}">
                                    <button class="btn flat-btn color-btn">
                                        Apply Now
                                    </button>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!--   hidden-works-item end -->
                </div>
            </div>
        </div>
        <!-- hidden-info-wrap end -->
        <div class="fl-wrap limit-box"></div>
    </section>
    <!-- section end-->
    </div>
@endsection

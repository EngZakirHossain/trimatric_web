@extends('layouts.master')
@section('title', $project['title'] ?? 'Project Details')

@section('content')
    <!-- Content-->
        <div class="single-page-decor"></div>
        <div class="single-page-fixed-row">
            <div class="scroll-down-wrap">
                <a href="{{route('home')}}">
                    <img class="img-responsive" width="180px" height="50px" src="{{ $siteSetting['logo'] ?? '' }}" alt="">
                </a>
            </div>
            <a href="{{route('projects.list')}}" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to projects</span></a>
        </div>
        <!-- section  -->
        <section class="dark-bg sinsec-dec">
            <div class="single-project-title fl-wrap">
                <h2><span class="caption">{{$project['title']}}</span></h2>
            </div>
            <!-- show-case-slider-wrap-->
            <div class="show-case-slider-wrap slider-carousel-wrap">
                <div class="sp-cont sarr-contr sp-cont-prev"><i class="fal fa-arrow-left"></i></div>
                <div class="sp-cont sarr-contr sp-cont-next"><i class="fal fa-arrow-right"></i></div>
                <div class="show-case-slider cur_carousel-slider-container lightgallery fl-wrap full-height" data-slick='{"centerMode": false}'>
                    <!-- show-case-item -->
                    <div class="show-case-item" data-curtext="{{$project['title']}}">
                        <div class="show-case-wrapper fl-wrap full-height">
                            <a href="{{$project['cover_image']}}" data-fancybox="gallery">
                            <img src="{{$project['cover_image']}}" alt="">
                            </a>
                            <div class="show-info">
                                <span>Info</span>
                                <div class="tooltip-info">
                                    <h5>{{$project['title']}}</h5>
                                    <p>{{$project['description']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @foreach($project['images'] as $pro)
                    <!-- show-case-item -->
                    <div class="show-case-item" data-curtext="{{$project['title']}}">
                        <div class="show-case-wrapper fl-wrap full-height">
                            <a href="{{$pro['url']}}" data-fancybox="gallery">
                                <img  src="{{$pro['url']}}" alt="{{$project['category_name']}}">
                            </a>
                        </div>
                    </div>
                @endforeach
                <!-- show-case-item end-->
                </div>
                <div class="fet_pr-carousel-counter show-case-slider-counter"></div>
            </div>
            <!-- show-case-slider-wrap end-->
            <div class="half-bg-dec single-half-bg-dec" data-ran="12"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section data-scrollax-parent="true">
            <div class="section-subtitle right-pos"  data-scrollax="properties: { translateY: '-250px' }"><span>//</span>{{$project['title']}}</div>
            <div class="container">
                <!-- det box-->
                <div class="fl-wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="fixed-column l-wrap">
                                <div class="pr-title fl-wrap">
                                    <h3>Project Details</h3>
                                        <span>{{$project['description']}}</span>
                                </div>
                                <div class="ci-num"><span></span></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="details-wrap fl-wrap">
                                <h3>Project Name: <span>{{$project['title']}}</span></h3>
                                <div class="parallax-header"><span>Category : </span><a href="#">{{$project['category_name']}}</a></div>
                            </div>
                            <div class="pr-list fl-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul>
                                            <li><span>Status :</span> {{$project['status'] == 1 ? 'Completed' : 'In Progress'}} </li>
                                            <li><span>CATEGORY :</span> {{$project['category_name']}} </li>
                                            <li><span>CLIENT :</span> {{$project['client_name']}} </li>
                                            <li><span>LOCATION : </span>  <a href="#" target="_blank"> {{$project['client_address']}}  </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!-- det box end-->
                <div class="content-nav mar-top">
                    <ul>
                        @if($previous_project)
                        <li>
                            <a href="{{route('project.details',[$previous_project['slug']])}}" class="ln">
                                <i class="fal fa-arrow-left"></i>
                                <span class="tooltip">Prev - {{$previous_project['title']}}</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{route('projects.list')}}" class="cur-page">
                                <span>All Projects</span>
                            </a>
                        </li>
                        @if ($next_project)
                        <li>
                            <a href="{{route('project.details',[$next_project['slug']])}}" class="rn">
                                <i class="fal fa-arrow-right"></i>
                                <span class="tooltip">Next - {{$next_project['title']}}</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
            <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
            <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
            <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->
@endsection

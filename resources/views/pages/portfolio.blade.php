@extends('layouts.master')
@section('title', 'Portfolio')

@section('content')
        @include('layouts.partials.breadcrumb')
        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem"  data-bg="{{asset('assets/images/portfolio.webp')}}" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="pattern-bg"></div>
            <div class="container">
                <div class="section-title">
                    <h2>Our <span>realized</span>  <br> and future projects</h2>
                    <div class="horizonral-subtitle"><span>PROJECTS</span></div>
                </div>
                <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
            </div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle"  data-scrollax="properties: { translateY: '150px' }" >Portfolio<span>//</span></div>
            <div class="content">
                <!-- filter -->
                <div class="filter-holder inline-filter fl-wrap  mar-bottom">
                    <div class="filter-button"><i class="fal fa-filter"></i> <span>Filter : </span></div>
                    <div class="gallery-filters">
                        <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*">All</a>
                        @foreach($categories as $category)
                            <a href="#" class="gallery-filter" data-filter=".{{$category}}">{{$category}}</a>
                        @endforeach
                    </div>
                    <div class="folio-counter">
                        <div class="num-album"></div>
                        <div class="all-album"></div>
                    </div>
                </div>
                <!-- filter end-->
                <!-- portfolio start -->
                <div class="gallery-items spad  hde three-column">
                @foreach( $portfolios as $portfolio)
                    <div class="gallery-item {{$portfolio['slug_category']}}">
                        <div class="grid-item-holder ">
                            <a href="{{$portfolio['url']}}" data-fancybox="gallery">
                                <img  src="{{$portfolio['url']}}" alt="{{$portfolio['project_name']}}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- portfolio end -->
            </div>
            <div class="sec-lines"></div>
        </section>
@endsection


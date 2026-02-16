@extends('layouts.master')

@section('title', 'Our Team')

@section('content')

    <div class="single-page-decor"></div>
    @include('layouts.partials.breadcrumb')
    {{-- Hero Section --}}
    <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
        <div class="bg par-elem"
            data-bg="{{ asset('assets/images/team.webp') }}"
            data-scrollax="properties: { translateY: '30%' }"
            style="background-image:url('{{ asset('assets/images/team.webp') }}')">
        </div>
        <div class="overlay"></div>
        <div class="pattern-bg"></div>

        <div class="container">
            <div class="section-title">
                <h2>Our <span>Awesome</span> <br> Team</h2>
                <p>
                    Our awesome team is growing. We truly believe in a diverse range of
                    creative professionals bringing ideas and creativity together.
                </p>
                <div class="horizonral-subtitle">
                    <span>Unity</span>
                </div>
                <a href="#sec1" class="custom-scroll-link hero-start-link">
                    <span>Let's Start</span>
                    <i class="fal fa-long-arrow-down"></i>
                </a>
            </div>
        </div>
    </section>

    <section data-scrollax-parent="true" id="sec1">
        <div class="section-subtitle right-pos"  data-scrollax="properties: { translateY: '-250px' }"><span>//</span>Our Team</div>
        @if($ceo)
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="flex flex-col items-center justify-center">
                        <div class="team-photo">
                            <div class="overlay"></div>
                            <img src="{{ $ceo['image'] ?? asset('assets/images/placeholder.jpg') }}" width="400" height="400"
                                alt="{{ $ceo['name'] }}" class="image-cover team-photo">
                        </div>
                        <div class="team-info mt-3">
                            <h3>{{ $ceo['name'] }}</h3>
                            <h4>{{ $ceo['designation'] }}</h4>
                            @if(!empty($ceo['department']))
                                <h4>{{ $ceo['department'] }}</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(count($others))
            <div class="container">
                @foreach($others as $member)
                    <!-- team-box   -->
                    <div class="team-box">
                        <div class="team-photo">
                            <div class="overlay"></div>
                            <img src="{{ $member['image'] ?? asset('assets/images/placeholder.jpg') }}" width="370" height="370"
                                alt="{{ $member['name'] }}" class="image-cover">
                        </div>
                        <div class="team-info mt-3">
                            <h3>{{ $member['name'] }}</h3>
                            <h4>{{ $member['designation'] }}</h4>
                            @if(!empty($member['department']))
                                <h4>{{ $member['department'] }}</h4>
                            @endif
                        </div>
                    </div>
                    <!-- team-box end -->
                @endforeach
            </div>
        @endif
        <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
        <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
        <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
        <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
        <div class="sec-lines"></div>
    </section>

    {{-- Staff Section --}}
    <section>
        <div class="container">

            <div class="post fl-wrap fw-post text-center">
                <h2><span>OUR STAFF</span></h2>
                <div class="blog-media fl-wrap nomar-bottom">
                    <img src="{{ asset('assets/images/team.png') }}" alt="">
                </div>
            </div>

            <div class="post fl-wrap fw-post text-center">
                <h2><span>OUR WORKFORCE</span></h2>
                <div class="blog-media fl-wrap nomar-bottom">
                    <img src="{{ asset('assets/images/team.png') }}" alt="">
                </div>
            </div>

            <div class="post fl-wrap fw-post text-center">
                <h2><span>NO. OF EMPLOYEES</span></h2>
                <div class="blog-media fl-wrap nomar-bottom">
                    <img src="{{ asset('assets/images/graph.webp') }}" alt="">
                </div>
            </div>

            <div class="text-center">
                <a href="#" class="btn flat-btn color-btn">
                    View Organizational Chart
                </a>
            </div>

        </div>
    </section>

@endsection

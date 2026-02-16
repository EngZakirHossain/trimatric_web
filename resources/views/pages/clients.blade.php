@extends('layouts.master')
@section('title', 'Clients')
@section('content')
    <!-- Content-->
    <div class="content">
        @include('layouts.partials.breadcrumb')
        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem" data-bg="{{asset('assets/images/clients.jpg')}}" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="pattern-bg"></div>
            <div class="container">
                <div class="section-title">
                    <h2>Our <span>most</span> valuable  <br> clients</h2>
                    <p>One of the deep secrets of life is that all that is really worth doing is what we do for others. </p>
                    <div class="horizonral-subtitle"><span>Clients</span></div>
                </div>
                <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
            </div>
        </section>
        <!-- section end-->
        <!-- section -->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle"  data-scrollax="properties: { translateY: '150px' }" >Clients<span>//</span></div>
            <div class="container">
                <!-- portfolio start -->
                <div class="gallery-items spad four-column">
                    @foreach($clients as $client)
                        <!-- gallery-item-->
                        <div class="gallery-item ">
                            <div class="grid-item-holder">
                                <img src="{{ $client['logo'] }}" data-toggle="popover" title="{{$client['name']}}" style="height: 150px; width:150px">
                            </div>
                        </div>
                        <!-- gallery-item end-->
                    @endforeach
                </div>`
                <!-- portfolio end -->
            </div>
            <div class="sec-lines"></div>
        </section>
        <!-- section-->
    </div>
    <!-- Content end -->
@endsection


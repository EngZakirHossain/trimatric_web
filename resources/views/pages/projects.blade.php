@extends('layouts.master')
@section('title', 'Projects')

@section('content')
    <!-- Content-->
    <div class="single-page-decor"></div>
    <div class="fsp-filter">
        <div class="filter-title"><i class="fal fa-filter"></i><span>Project Filter</span></div>
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
    <section class="dark-bg">
        <!-- portfolio start -->
        <div class="gallery-items min-pad four-column vis-box-det">
            <!-- gallery-item-->
            @foreach($projects as $project)
            <div class="gallery-item {{$project['category_name']}}">
                <div class="grid-item-holder">
                <a href="{{route('project.details',[$project['slug']])}}">
                    <a href="{{route('project.details',[$project['slug']])}}"/>
                    <img  src="{{$project['cover_image']}}" alt="{{$project['title']}}">
                    <div class="box-item hd-box">
                        <div class=" fl-wrap full-height">
                            <div class="hd-box-wrap">
                                <h2><a href="{{route('project.details',[$project['slug']])}}">{{$project['title']}}</a></h2>
                                <p><a href="#">{{$project['category_name']}}</a></p>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            </div>
            @endforeach
            <!-- gallery-item end-->
        </div>
        <!-- portfolio end -->
    </section>
    <!-- Content end -->
@endsection

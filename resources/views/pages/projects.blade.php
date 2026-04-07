@extends('layouts.master')

@section('title', 'Projects')

@section('style')
<style>
    .gallery-filters{
        display:flex;
        flex-wrap:wrap;
        gap:10px;
        align-items:center;
    }
    .more-dropdown{
        position:relative;
    }

    .more-menu{
        position:absolute;
        top:110%;
        left:0;
        background:#111;
        border-radius:6px;
        padding:10px;
        min-width:200px;
        max-height:260px;
        overflow-y:auto;
        display:none;
        flex-direction:column;
        z-index:999;
    }

    .more-menu .gallery-filter{
        display:block;
        padding:6px 10px;
        white-space:nowrap;
    }

    .more-dropdown.active .more-menu{
        display:flex;
    }

</style>
@endsection


@section('content')

    <div class="single-page-decor"></div>
    <div class="fsp-filter">

        <div class="filter-title">
            <i class="fal fa-filter"></i>
            <span>Project Filter</span>
        </div>

        <div class="gallery-filters">

            {{-- ALL --}}
            <a href="#" class="gallery-filter gallery-filter-active" data-filter="*">
                All
            </a>

            {{-- FIRST 6 CATEGORIES --}}
            @foreach($categories->take(6) as $category)
                <a href="#"
                class="gallery-filter"
                data-filter=".{{ Str::slug($category) }}">
                    {{ $category }}
                </a>
            @endforeach


            {{-- MORE DROPDOWN --}}
            @if($categories->count() > 6)
                <div class="more-dropdown">

                    <a href="#" class="gallery-filter more-toggle">
                        More ▾
                    </a>

                    <div class="more-menu">
                        @foreach($categories->slice(6) as $category)
                            <a href="#"
                            class="gallery-filter"
                            data-filter=".{{ Str::slug($category) }}">
                                {{ $category }}
                            </a>
                        @endforeach
                    </div>

                </div>
            @endif

        </div>
        <div class="folio-counter">
            <div class="num-album"></div>
            <div class="all-album"></div>
        </div>
    </div>
    <section class="dark-bg">

        <div class="gallery-items min-pad four-column vis-box-det">

            @foreach($projects as $project)

                <div class="gallery-item {{ Str::slug($project['slug_category']) }}">

                    <div class="grid-item-holder">

                        <a href="{{ route('project.details',[$project['slug']]) }}">

                            <img src="{{ $project['cover_image'] }}"
                                alt="{{ $project['title'] }}">

                            <div class="box-item hd-box">
                                <div class="fl-wrap full-height">
                                    <div class="hd-box-wrap">

                                        <h2>{{ $project['title'] }}</h2>

                                        <p>{{ $project['slug_category'] }}</p>

                                    </div>
                                </div>
                            </div>

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

@endsection


@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const dropdown = document.querySelector(".more-dropdown");
        if (!dropdown) return;

        const toggle = dropdown.querySelector(".more-toggle");

        toggle.addEventListener("click", function(e){
            e.preventDefault();
            dropdown.classList.toggle("active");
        });

        document.addEventListener("click", function(e){
            if(!dropdown.contains(e.target)){
                dropdown.classList.remove("active");
            }
        });

    });
</script>
@endsection

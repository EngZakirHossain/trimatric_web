<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta property="og:description" content="One of the pioneer concerns in the field of Interior Design & Turnkey based execution service provider for Residential, Commercial, Hospitality, Retail & Corporate Clients. With the proven capability of excellent imaginative ability and committed professionalism, we bring out the hidden persona of our clients’ and reflect it through Designs tailored accordingly. Apart from business opportunities, we are always keenly devoted to providing innovative, unique and outstanding perspectives for the fulfilment of the requirements which satisfies our clients.">
        <meta name="keywords" content="Trimatric, trimatric, Trimatric Architects & Engineers, Trimatric Architects and Engineers, trimatric website, trimatric websites, Trimatric Architects, Architects, Architecture firm, firm, Architects engineering, Engineering firm, Architect engineering">
        <meta name="google-site-verification" content="kJRM_xjbBCh1TTpZmVIfx3HKlUFCwckNudHuTvk-we0" />
        <meta name="p:domain_verify" content="a208b422fcf5394492c4809e8467e09c"/>

        <!-- Facebook -->
        <meta property="og:locale" content="en_US"/>
        <meta property="fb:app_id" content="1553345238357587"/>
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://trimatric.com/">
        <meta property="og:title" content="Trimatric Architects & Engineers">
        <meta property="og:description" content="One of the pioneer concerns in the field of Interior Design & Turnkey based execution service provider for Residential, Commercial, Hospitality, Retail & Corporate Clients. With the proven capability of excellent imaginative ability and committed professionalism, we bring out the hidden persona of our clients’ and reflect it through Designs tailored accordingly. Apart from business opportunities, we are always keenly devoted to providing innovative, unique and outstanding perspectives for the fulfilment of the requirements which satisfies our clients.">
        <meta property="og:image" content="{{ asset('assets/images/favicon.ico') }}">
        <meta property="og:image:type" content="image/png"/>
        <meta property="og:image:height" content="50"/>
        <meta property="og:image:width" content="50"/>

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://trimatric.com/">
        <meta property="twitter:title" content="Trimatric Architects & Engineers">
        <meta property="twitter:description" content="One of the pioneer concerns in the field of Interior Design & Turnkey based execution service provider for Residential, Commercial, Hospitality, Retail & Corporate Clients. With the proven capability of excellent imaginative ability and committed professionalism, we bring out the hidden persona of our clients’ and reflect it through Designs tailored accordingly. Apart from business opportunities, we are always keenly devoted to providing innovative, unique and outstanding perspectives for the fulfilment of the requirements which satisfies our clients.">
        <meta property="twitter:image" content="{{ asset('assets/images/favicon.ico') }}">
        <meta property="og:image:type" content="image/png"/>
        <meta property="og:image:height" content="50"/>
        <meta property="og:image:width" content="50"/>
        <!-- ============== title =============== -->
        <title>
        @hasSection('title')
            @yield('title') | Trimatric Architects & Engineers
        @else
            Trimatric Architects & Engineers | Architecture & Engineering Firm in Bangladesh
        @endif
        </title>
        @if(isset($seo) && is_array($seo))
            <meta name="title" content="{{ $seo['title'] }}">
            <meta name="description" content="{{ $seo['description'] }}">
            <meta name="keywords" content="{{ $seo['keywords'] }}">
        @endif
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="{{asset('assets')}}/css/reset.css">
        <link type="text/css" rel="stylesheet" href="{{asset('assets')}}/css/plugins.css">
        <link type="text/css" rel="stylesheet" href="{{asset('assets')}}/css/style.css">
        <link type="text/css" rel="stylesheet" href="{{asset('assets')}}/css/color.css">
        <link type="text/css" rel="stylesheet" href="{{asset('assets')}}/css/jquery.fancybox.min.css">
        <!-- In <head> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="canonical" href="{{ url()->current() }}">

        @yield('style')
        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon.png') }}">
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-5SJERTKGPV"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-5SJERTKGPV');
        </script>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-552Z926');</script>
        <!-- End Google Tag Manager -->
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div id="main">
            @include('layouts.partials.header')
            <!-- wrapper-->
            <div id="wrapper">
                @yield('topmenu')

                @yield('slider')
                <!-- Content-->
                <div class="content">
                    @yield('content')
                </div>
                <!-- Content end -->
                @include('layouts.partials.footer')
                <!-- contact-btn -->
                <a class="contact-btn color-bg" href="{{ route('contact') }}"><i class="fal fa-envelope"></i><span>Get in Touch</span></a>
                <!-- contact-btn end -->
            </div>
            <!--   content end -->
            <!-- share-wrapper -->
            <div class="share-wrapper isShare">
                <div class="share-title"><span>Share</span></div>
                <div class="close-share soa"><span>Close</span><i class="fal fa-times"></i></div>
                <div class="share-inner soa">
                    <div class="share-container"></div>
                </div>
            </div>
            <!-- share-wrapper end -->
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{asset('assets')}}/js/jquery.min.js"></script>
        <script type="text/javascript" src="{{asset('assets')}}/js/plugins.js"></script>
        <script type="text/javascript" src="{{asset('assets')}}/js/scripts.js"></script>
        <script type="text/javascript" src="{{asset('assets')}}/js/jquery.fancybox.min.js"></script>

        <!-- Before closing </body> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(document).ready(function() {
                @if(session('message'))
                    toastr.success("{{ session('message') }}");
                @endif

                @if(session('error'))
                    toastr.error("{{ session('error') }}");
                @endif
            });
        </script>
        @yield('script')

    </body>
</html>

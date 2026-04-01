<!-- header-->
<header class="main-header">
    <a class="logo-holder" href="{{route('home')}}">
        <img src="{{ $siteSetting['favicon'] ?? '' }}"  loading="lazy" >
    </a>
    <!-- nav-button-wrap-->
    <div class="nav-button but-hol">
        <span  class="nos"></span>
        <span class="ncs"></span>
        <span class="nbs"></span>
        <div class="menu-button-text">Menu</div>
    </div>
    <!-- nav-button-wrap end-->
    <div class="header-social">
        <ul >
            @foreach(getSocialLinks() as $key => $icon)
                @if(!empty($siteSetting[$key]))
                    <li>
                        <a href="{{ $siteSetting[$key] }}" target="_blank" rel="noopener noreferrer">
                            <i class="fab {{ $icon }}"></i>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <!--  showshare -->
    <div class="show-share showshare">
        <i class="fal fa-retweet"></i>
        <span>Share This</span>
    </div>
    <!--  showshare end -->
</header>
<!--  header end -->
<!--  navigation bar -->
<div class="nav-overlay">
    <div class="tooltip color-bg">Close Menu</div>
</div>
<div class="nav-holder">
    <a class="header-logo" href="{{route('home')}}">
        <img class="img-responsive" width="250" height="50" src="{{ $siteSetting['logo'] ?? '' }}" alt="" loading="lazy">
    </a>
    <div class="nav-title"><span>Menu</span></div>
    <div class="nav-inner-wrap">
        <nav class="nav-inner sound-nav" id="menu">
            <ul>
                <li><a href="{{route('home')}}" class="external" target="">Home</a></li>
                <li><a href="{{route('home')}}#sec2" class="scroll-link" target="">About</a></li>
                <li><a href="{{route('home')}}#sec3" class="scroll-link" target="">Services</a></li>
                <li><a href="{{route('projects.list')}}" class="external" target="">Project</a></li>
                <li><a href="{{route('portfolio')}}" class="external" target="">portfolio</a></li>
                <li><a href="{{route('team.list')}}" class="external" target="">Team</a></li>
                <li><a href="{{route('circular.list')}}" class="external" target="">Career</a></li>
                <li><a href="{{route('clients.list')}}" class="external" target="">Clients</a></li>
                <li><a href="{{route('contact')}}" class="external" target="">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</div>
<!--  navigation bar end -->

<div class="scroll-nav-wrap fl-wrap">
    <div class="scroll-down-wrap">
        <a href="{{route('home')}}">
            <img class="img-responsive" width="180px" height="50px" src="{{ $siteSetting['logo'] ?? '' }}" alt="">
        </a>
    </div>
    <nav class="scroll-nav scroll-init">
        <ul>
            <li><a class="scroll-link act-link" href="#sec1">Home</a></li>
            <li><a class="scroll-link" href="#sec2">About</a></li>
            <li><a class="scroll-link" href="#sec3">Services</a></li>
            <li><a class="scroll-link" href="#sec4">Projects</a></li>
            <li><a class="scroll-link" href="#sec5">Clients</a></li>
            <li><a href="{{route('portfolio')}}" class="external" target="">Portfolio</a></li>
            <li><a href="{{route('team.list')}}" class="external" target="">Team</a></li>
        </ul>
    </nav>
</div>

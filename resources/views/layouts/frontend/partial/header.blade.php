<header>

    <div class="container-fluid position-relative no-side-padding">

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">

            <li><a href="{{ route('home') }}" class="button"><span>Snippets </span></a></li>
            <li><a href="{{ route('home') }}">Home</a></li>

            <li class="dropdown">
                <button class="dropbtn">Pages</button>
                <div class="dropdown-content">
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                    <a href="{{ route('disclaimer') }}">Disclaimer</a>
                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                </div>
            </li>

            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>

            @else
                @if(Auth::user()->role->id == 1)
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endif
                @if(Auth::user()->role->id == 2)
                    <li><a href="{{ route('author.dashboard') }}">Dashboard</a></li>
                @endif
            @endguest


        </ul><!-- main-menu -->

        <div class="src-area">
            <form method="GET" action="{{ route('search') }}">
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="Search">
            </form>
        </div>

        <!-- banner script here -->


    </div><!-- conatiner -->



</header>

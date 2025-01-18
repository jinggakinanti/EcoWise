<nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" style="background-color:#B8C8B4">
    <div class="container-fluid">
        <!-- Logo -->
        @auth
            @if(auth()->user()->roles == 'customer')
                <a class="navbar-brand" href="{{ route('home.page') }}">
                    <img src="{{ asset('img/GreenLogo.jpg') }}" alt="Logo" width="60" height="54" class="rounded-circle">
                    EcoWise
                </a>
            @elseif(auth()->user()->roles == 'admin')
                <a class="navbar-brand" href="{{ route('home_admin.page') }}">
                    <img src="{{ asset('img/GreenLogo.jpg') }}" alt="Logo" width="60" height="54" class="rounded-circle">
                    EcoWise
                </a>
            @endif
        @endauth

        @guest
            <a class="navbar-brand" href="{{ route('home.page') }}">
                <img src="{{ asset('img/GreenLogo.jpg') }}" alt="Logo" width="60" height="54" class="rounded-circle">
                EcoWise
            </a>  
        @endguest

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation -->
        <div class="collapse navbar-collapse ms-4" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto gap-4 align-items-center">
                @auth
                    @if(auth()->user()->roles == 'customer')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home.page') ? 'active' : '' }}" href="{{ route('home.page') }}">@lang('ecowise.home')</a>
                        </li>
                    @elseif(auth()->user()->roles == 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home_admin.page') ? 'active' : '' }}" href="{{ route('home_admin.page') }}">@lang('ecowise.home')</a>
                        </li>
                    @endif
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home.page') ? 'active' : '' }}" href="{{ route('home.page') }}">@lang('ecowise.home')</a>
                    </li>
                @endguest

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('category.page') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('ecowise.category')
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('category.page', 1) }}">@lang('ecowise.personal_care')</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('category.page', 2) }}">@lang('ecowise.household')</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('category.page', 3) }}">@lang('ecowise.reuseable')</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <form class="d-flex align-items-center" action="{{ route('search.page') }}" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Search All Products" aria-label="Search" name="query">
                        <button class="btn btn-outline-success" type="submit">@lang('ecowise.search_btn')</button>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto gap-4 align-items-center">
                @auth
                    @if(auth()->user()->roles == 'customer')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('cart.page') ? 'active' : '' }}" href="{{route('cart.page')}}">@lang('ecowise.cart')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('transaction.page') ? 'active' : '' }}" href="{{route('transaction.page')}}">@lang('ecowise.my_order')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('profile.page') ? 'active' : '' }}" href="{{route('profile.page')}}">@lang('ecowise.profile')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('aboutus.page') ? 'active' : '' }}" href="{{route('aboutus.page')}}">@lang('ecowise.about_us')</a>
                        </li>
                    
                    @elseif(auth()->user()->roles == 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('alltransaction.page') ? 'active' : '' }}" href="{{route('alltransaction.page')}}">@lang('ecowise.transaction')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('aboutus.page') ? 'active' : '' }}" href="{{route('aboutus.page')}}">@lang('ecowise.about_us')</a>
                        </li>
                        <li class="nav-item">
                            <div>
                                <a href="{{ route('logout') }}" class="nav-link" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    @lang('ecowise.logout')
                                </a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang('ecowise.login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('ecowise.register')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('aboutus.page') ? 'active' : '' }}" href="{{route('aboutus.page')}}">@lang('ecowise.about_us')</a>
                    </li>
                @endguest
                <div class="dropdown">
                    <button class="btn btn-language dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (app()->getLocale() === 'en')
                            EN
                        @elseif(app()->getLocale() === 'id')
                            ID
                        @endif
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="dropdown-item" href="{{ route('set-locale', 'en') }}" data-value="en">EN</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('set-locale', 'id') }}" data-value="id">ID</a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-nav .nav-link {
        color: #000;
        font-size: 1rem;
    }

    .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
        color: #ECFCCE;
    }

    .btn-outline-success {
        background-color: #B8C8B4;
        color: black;
        border-color: black;
    }

    .btn-outline-success:hover {
        background-color: #ECFCCE;
        color: black;
        border-color: #ECFCCE;
    }

    .btn-language {
        background-color: #B8C8B4;
        color: black;
        border: none;
    }

    .btn-language:hover {
        background-color: #ECFCCE;
        color: black;
    }

    @media (max-width: 1150px) {
        .navbar-nav {
            gap: 1px !important;
        }
    }
</style>

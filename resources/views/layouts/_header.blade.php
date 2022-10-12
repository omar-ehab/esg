<a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>
<div class="header-top-area  {{ Route::currentRouteName() == 'home' ? 'hometop' : '' }}">

    <div class="mainmenu-area {{ Route::currentRouteName() == 'home' ? 'homemenu' : '' }}" id="mainmenu-area">
        <div class="mainmenu-area-bg"></div>
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ route('home') }}" class="navbar-brand off">
                        @if(Route::currentRouteName() == 'home')
                            <img src="{{ asset('assets/themes/theme_en/img/logos/sm-white-full-logo.png') }}"
                                 alt="ESG Logo">
                        @else
                            <img src="{{ asset('assets/themes/theme_en/img/logos/sm-blue-full-logo.png') }}"
                                 alt="ESG Logo">
                        @endif
                    </a>
                    <a href="{{ route('home') }}" class="navbar-brand on"><img
                            src="{{ asset('assets/themes/theme_en/img/logos/sm-blue-full-logo.png') }}" alt="ESG Logo"></a>
                </div>
                @include('search.search')
            </div>
        </nav>
    </div>
</div>

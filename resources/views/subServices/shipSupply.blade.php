@extends('layouts.main')
@section('content')
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--
<header class="top-area single-page" id="home">
    <div class="top-area-bg" data-stellar-background-ratio="0.6" style="background-image: url('{{asset('/bannerImages')}}/{{ $banner->banner_image  }}');background-position: center;"></div>
-->
    <div class="header-top-area">
        <!--MAINMENU AREA-->
        <div class="mainmenu-area" id="mainmenu-area">
            <div class="mainmenu-area-bg"></div>
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{route('homepage')}}" class="navbar-brand off"><img
                                src="{{asset('themes/theme_en/img/egymar-logo.png')}}" alt="logo"></a>
                        <a href="{{route('homepage')}}" class="navbar-brand on"><img
                                src="{{asset('themes/theme_en/img/egymar-logo.png')}}" alt="logo"></a>
                    </div>
                    @include('search.search')


                </div>
            </nav>
        </div>
        <!--END MAINMENU AREA END-->
    </div>
    <header class="top-area single-page" id="home">

        <div class="welcome-area"
             style="background-image: url('{{asset('/bannerImages')}}/{{ $banner->banner_image  }}');background-position: center;background-size: cover;">
            <div class="area-bg"></div>
            <div class="container">
                <!--
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text text-center">
                        <h2>{{ $banner->banner_title}}</h2>

                    </div>
                </div>
            </div>
-->
            </div>
        </div>
    </header>


    <section class="blog-area blog-page section-padding">
        <div class="container">
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                        <h2>{{ $banner->banner_title}}</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <div class="shipping-service wow fadeIn">

                        <div class="shipping-service-details industrypage">


                            <p> {!!html_entity_decode( $shipSupply->ship_supply_desc_paragraph)!!} </p>


                            <br>

                            <h4>{{ $shipSupply->ship_supply_desc_title2 }}</h4>

                            <p> {!!html_entity_decode( $shipSupply->ship_supply_desc_list)!!} </p>

                        </div>
                        @if(count($images) >=1)

                            <div id="images" class=" tab-pane">
                                <main class="main">
                                    <div class="container-fancy">
                                        @foreach($images as $image)
                                            <div class="card">
                                                <div class="card-image">
                                                    <a href="{{asset('/serviceImages')}}/{{ $image->ship_supply_image_img  }}"
                                                       data-fancybox="gallery">
                                                        <img
                                                            src="{{asset('/serviceImages')}}/{{ $image->ship_supply_image_img  }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </main>
                            </div>
                        @endif
                    </div>


                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">

                        <div class="single-sidebar-widget widget_categories">
                            <h4>Other Shipping Services</h4>
                            <ul>
                                <li><a href="{{ route('shipAgency') }}">Ship Agency Services</a></li>
                                <li><a href="{{ route('husbandry') }}">Husbandry Services</a></li>
                                <li><a href="{{ route('shipSupply') }}">Ship Supply Services</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection

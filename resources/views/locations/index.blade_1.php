@extends('layouts.main')
@section('content')

<!--SCROLL TO TOP-->
<a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

<!--START TOP AREA-->
<header class="top-area single-page" id="home">
    <div class="top-area-bg" data-stellar-background-ratio="0.6"
         style="background-image: url('{{asset('/bannerImages')}}/{{ $banner->banner_image  }}');background-position: center;">

    </div>
    <!--Banner-->
    <div class="welcome-area">
        <div class="area-bg"></div>
        <div class="container">
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text text-center">
                        <h2>{{$banner->title}} </h2>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-top-area">
        <!--MAINMENU AREA-->
        <div class="mainmenu-area" id="mainmenu-area">
            <div class="mainmenu-area-bg"></div>
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <a href="index.html" class="navbar-brand off"><img
                                src="{{asset('themes/theme_en/img/logo-white.png')}}" alt="logo"></a>
                        <a href="index.html" class="navbar-brand on"><img
                                src="{{asset('themes/theme_en/img/egymar-logo.png')}}" alt="logo"></a>
                    </div>
                    <div class="search-and-language-bar pull-right">
                        <ul>


                            <li>
                                <div class="span3 widget-span widget-type-raw_html custom-search" style=""
                                     data-widget-type="raw_html" data-x="4" data-w="3">
                                    <div class="cell-wrapper layout-widget-wrapper">
                                        <span id="hs_cos_wrapper_module_14308928327274411"
                                              class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_raw_html"
                                              style="" data-hs-cos-general-type="widget" data-hs-cos-type="raw_html">
                                            <form method="GET" action="" role="search"
                                                  class="navbar-form navbar-left ng-pristine ng-valid" id="express-form"
                                                  novalidate="">
                                                <input required="" name="q" placeholder="Search"
                                                       class="form-control tt-input" id="express-form-typeahead"
                                                       autocomplete="off" spellcheck="false" dir="auto" type="text">
                                                <button class="search-btn" type="submit"><span
                                                        class="icon"></span></button>
                                            </form>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <button id="sidenav-toggle"><i class="fas fa-bars"></i></button>
                            </li>
                        </ul>

                    </div>

                </div>
            </nav>
        </div>
        <!--END MAINMENU AREA END-->
    </div>


</header>


<!--END TOP AREA-->
<!--    End side nav menu-->


<!--CONTACT US AREA-->
<section class="contact-area" id="contact">
    <div class="contact-form-area section-padding gray-bg">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="map-area relative">
                        <h3>You Can find Our locations</h3>
                        <div class="row">
                            @foreach($locations as $location)
                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 first">
                                <div class="services-area-image">
                                    <i class="fas fa-map-pin"></i>
                                </div>
                                <div class="map-details">
                                    <p>{{$location->location_title}}</p>
                                </div>

                            </div>
                            @endforeach
                            <!--
                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 second">
                                <div class="services-area-image">
                                    <i class="fas fa-map-pin"></i>
                                </div>
                                <div class="map-details">
                                    <p>Cairo</p>
                                </div>

                            </div>

                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 second">
                                <div class="services-area-image">
                                    <i class="fas fa-map-pin"></i>
                                </div>
                                <div class="map-details">
                                    <p>Suez</p>
                                </div>

                            </div> -->

                        </div>
                        <br>


                        <!-- <div class="row">

                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 thirdlocation">
                                <div class="services-area-image">
                                    <i class="fas fa-map-pin"></i>
                                </div>
                                <div class="map-details">
                                    <p>Port Said</p>
                                </div>

                            </div>

                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 second">
                                <div class="services-area-image">
                                    <i class="fas fa-map-pin"></i>
                                </div>
                                <div class="map-details">
                                    <p>Damietta</p>
                                </div>

                            </div>


                        </div> -->


                    </div>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="map-area relative">
                        <img src="{{asset('/locationImages')}}/{{ $locationImage->location_img  }}">


                    </div>
                </div>


            </div>
        </div>
    </div>


</section>


@endsection

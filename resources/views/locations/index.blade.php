@extends('layouts.main')
@section('content')

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--
<header class="top-area single-page" id="home">
    <div class="top-area-bg" data-stellar-background-ratio="0.6" style="background-image: url('{{asset('/bannerImages')}}/{{ $banner->banner_image  }}');background-position: center;background-size: cover;"></div>
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
            <div class="container">
                <!--
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text text-center">
                        <h2>{{ $banner->title }}</h2>
                    </div>
                </div>
            </div>
-->
            </div>
        </div>
    </header>

    <!--CONTACT US AREA-->
    <section class="contact-area" id="contact">
        <div class="contact-form-area section-padding gray-bg">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $banner->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="map-area relative">
                            <h3>You Can Find Our Offices</h3>

                            <div class="row">
                                @foreach($locations as $i => $location)

                                    <div
                                        class="col-md-4 col-lg-4 col-sm-4 col-xs-4 {{($i == 3) ? 'thirdlocation' : '' }}{{($i == 4) ? 'fourthlocation' : '' }}">
                                        <div class="services-area-image">
                                            <i class="fas fa-map-pin"></i>
                                        </div>
                                        <!--                                <div class="map-details" data-md-tooltip="Moustafa Kamel & Ramsis st , El Shark tower , 1st floor , flat 31 , Port Said.">-->
                                        <div class="map-details">
                                            <a href="javascript:void(0)" tooltip="{{$location->location_address}}">
                                                <p>{{$location->location_title}}</p>
                                            </a>
                                        </div>

                                    </div>
                                @endforeach


                            </div>


                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="map-area relative">
                            <img src="{{asset('/images')}}/{{$image->main_img}}">
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </section>
    <!--CONTACT US AREA END-->
@endsection

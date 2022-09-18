@extends('layouts.main')
@section('content')
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
            <div class="area-bg"></div>
            <div class="container">
                <!--
                            <div class="row flex-v-center">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <div class="welcome-text text-center">
                                        <h2>Activities</h2>
                                    </div>
                                </div>
                            </div>
                -->
            </div>
        </div>
    </header>
    <!--ABOUT AREA-->

    <section class="main-industries">
        <div class="container mb-5">
            <div class="text-left industries-section mt-5">
                <h1>{{$industryService->industries_service_name}}</h1>

                <p> {!!html_entity_decode( $industryService->industries_service_description)!!}</p>


            </div>
            <div class="row">
                @foreach($industryService->industriesService as $i=> $service)
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <a href="{{ route('serviceDetails', $service->service_id) }}">
                            <div class="box-industries served">
                                <div class="our-services-industries">
                                    <div class="icon"><img
                                            src="{{asset('/industriesService')}}/{{$service->service_main_img}}"></div>
                                    <div class="text">
                                        <h4>{{$service->service_title}}</h4>
                                            <?php $desc = substr($service->service_desc_paragraph, 0, 55); ?>
                                        <p> {!!html_entity_decode( $desc)!!} ...</p>
                                        <a href="{{ route('serviceDetails', $service->service_id) }}"
                                           class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800">
                                            <span class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>


        </div>
    </section>

@endsection

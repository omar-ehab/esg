@extends('layouts.main')
@section('content')
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
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
            <div class="container">
                <!--
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text text-center">
                        <h2>{{ $banner->banner_title}} </h2>
                    </div>
                </div>
            </div>
-->
            </div>
        </div>

    </header>

    <section class="main-industries">
        <div class="container mb-5">
            <!--
          <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text text-center">
                        <h2>{{ $banner->banner_title}} </h2>
                    </div>
                </div>
            </div>
-->

            <div class="text-left industries-section mt-5">
                <h1>{{ $depotStorage->service_name }}</h1>

                <p> {!!html_entity_decode( $depotStorage->service_description)!!}</p>

            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{route('depotService')}}">
                        <div class="box-industries">
                            <div class="our-services-industries">
                                <div class="icon"><img
                                        src="{{asset('/images')}}/{{ $depotServiceMainImage->main_img  }}"></div>
                                <div class="text">
                                    <h4>Depot Services</h4>

                                    <?php
                                    $descsDepot = explode(" ", strip_tags($depotServiceMainImage->main_desc));
                                    $countDepot = count($descsDepot); ?>



                                    @if($countDepot <= 14)
                                            <?php $countWordsDepot = $countDepot - 2 ?>
                                    @else
                                            <?php $countWordsDepot = 15 ?>

                                    @endif

                                    <?php $firstPartDepot = implode(" ", array_splice($descsDepot, 0, $countWordsDepot)); ?>
                                    <p> {!!html_entity_decode( $firstPartDepot)!!}...</p>


                                    <a href="{{route('depotService')}}"
                                       class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800"> <span
                                            class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{route('depotLocation')}}">
                        <div class="box-industries">
                            <div class="our-services-industries">
                                <div class="icon"><img
                                        src="{{asset('/images')}}/{{ $depotLocationMainImage->main_img  }}"></div>
                                <div class="text">
                                    <h4>Depot Location</h4>
                                    <?php
                                    $descsDepotLocation = explode(" ", strip_tags($depotServiceMainImage->main_desc));
                                    $countDepotLocation = count($descsDepotLocation); ?>



                                    @if($countDepotLocation <= 14)
                                            <?php $countWordsDepotLocation = $countDepotLocation - 2 ?>
                                    @else
                                            <?php $countWordsDepotLocation = 15 ?>

                                    @endif

                                    <?php $firstPartDepotLocation = implode(" ", array_splice($descsDepotLocation, 0, $countWordsDepotLocation)); ?>
                                    <p> {!!html_entity_decode( $firstPartDepotLocation)!!}...</p>


                                    <a href="{{route('depotLocation')}}"
                                       class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800"> <span
                                            class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>


        </div>
    </section>
@endsection

@extends('layouts.main')
@section('content')
    <!--START TOP AREA-->
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
            <div class="container">
                <!--
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text text-center">
                        <h2>{{ $banner->title}} </h2>
                    </div>
                </div>
            </div>
-->
            </div>
        </div>

    </header>


    <section class="main-industries">
        <div class="container mb-5">
            <div class="text-left industries-section mt-5">
                <h1>{{ $shipping->service_name }}</h1>
                <p> {!!html_entity_decode( $shipping->service_description)!!} </p>

            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{route('shipAgency')}}">
                        <div class="box-industries">
                            <div class="our-services-industries">
                                <div class="icon"><img
                                        src="{{asset('/images')}}/{{ $shipAgencyServiceMain->main_img  }}"></div>
                                <div class="text">
                                    <h4>{{ $shipAgencyService->ship_agency_title }}</h4>


                                    <?php
                                    $descsMain = explode(" ", strip_tags($shipAgencyServiceMain->main_desc));
                                    $countMain = count($descsMain); ?>



                                    @if($countMain <= 14)
                                            <?php $countWordsMain = $countMain - 2 ?>
                                    @else
                                            <?php $countWordsMain = 15 ?>

                                    @endif

                                    <?php $firstPartMain = implode(" ", array_splice($descsMain, 0, $countWordsMain)); ?>
                                    <p> {!!html_entity_decode( $firstPartMain)!!}...</p>


                                    <a href="{{route('shipAgency')}}"
                                       class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800"> <span
                                            class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{ route('husbandry') }}">
                        <div class="box-industries">
                            <div class="our-services-industries">
                                <div class="icon"><img
                                        src="{{asset('/images')}}/{{ $husbandryServiceMain->main_img  }}"></div>
                                <div class="text">
                                    <h4>{{ $husbandryService->husbandry_title }}</h4>


                                    <?php
                                    $descsMain2 = explode(" ", strip_tags($husbandryServiceMain->main_desc));
                                    $countMain2 = count($descsMain2); ?>



                                    @if($countMain2 <= 14)
                                            <?php $countWordsMain2 = $countMain2 - 2 ?>
                                    @else
                                            <?php $countWordsMain2 = 15 ?>

                                    @endif

                                    <?php $firstPartMain2 = implode(" ", array_splice($descsMain2, 0, $countWordsMain2)); ?>
                                    <p> {!!html_entity_decode( $firstPartMain2)!!}...</p>


                                    <a href="{{ route('husbandry') }}"
                                       class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800"> <span
                                            class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{ route('shipSupply') }}">
                        <div class="box-industries">
                            <div class="our-services-industries">
                                <div class="icon"><img
                                        src="{{asset('/images')}}/{{ $shipSupplyServiceMain->main_img  }}"></div>
                                <div class="text">
                                    <h4>{{ $shipSupplyService->ship_supply_title }}</h4>


                                    <?php
                                    $descsMain3 = explode(" ", strip_tags($shipSupplyServiceMain->main_desc));
                                    $countMain3 = count($descsMain3); ?>



                                    @if($countMain3 <= 14)
                                            <?php $countWordsMain2 = $countMain3 - 2 ?>
                                    @else
                                            <?php $countWordsMain3 = 15 ?>

                                    @endif

                                    <?php $firstPartMain3 = implode(" ", array_splice($descsMain3, 0, $countWordsMain3)); ?>
                                    <p> {!!html_entity_decode( $firstPartMain3)!!}...</p>


                                    <a href="{{ route('shipSupply') }}"
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

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
            <div class="text-left industries-section mt-5">
                <h1>{{ $logistics->service_name }}</h1>


                <p> {!!html_entity_decode( $logistics->service_description)!!}</p>

            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{ route('seaFreight') }}">
                        <div class="box-industries">
                            <div class="our-services-industries">
                                <div class="icon"><img src="{{asset('/images')}}/{{ $seaFreightsMain->main_img  }}">
                                </div>
                                <div class="text">
                                    <h4>Sea Freight Services</h4>
                                    <?php
                                    $descsFrieght = explode(" ", strip_tags($seaFreightsMain->main_desc));
                                    $countFreight = count($descsFrieght); ?>



                                    @if($countFreight <= 14)
                                            <?php $countWordsFreight = $countFreight - 2 ?>
                                    @else
                                            <?php $countWordsFreight = 15 ?>

                                    @endif

                                    <?php $firstPartFreight = implode(" ", array_splice($descsFrieght, 0, $countWordsFreight)); ?>
                                    <p> {!!html_entity_decode( $firstPartFreight)!!}...</p>

                                    <a href="{{ route('seaFreight') }}"
                                       class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800"> <span
                                            class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{ route('trucking') }}">
                        <div class="box-industries">
                            <div class="our-services-industries">
                                <div class="icon"><img src="{{asset('/images')}}/{{ $truckingMain->main_img  }}"></div>
                                <div class="text">
                                    <h4>Trucking Services</h4>
                                    <?php
                                    $descsTrucking = explode(" ", strip_tags($truckingMain->main_desc));
                                    $countTrucking = count($descsTrucking);
                                    ?>

                                    @if($countTrucking <= 14)

                                            <?php $countWordsTrucking = $countTrucking - 2 ?>
                                    @else
                                            <?php $countWordsTrucking = 15 ?>

                                    @endif

                                    <?php $firstPartTrucking = implode(" ", array_splice($descsTrucking, 0, $countWordsTrucking)); ?>

                                    <p> {!!html_entity_decode( $firstPartTrucking)!!}...</p>


                                    <a href="{{ route('trucking') }}"
                                       class="flex flex-row items-center mt-3 text-blue-600 hover:text-blue-800"> <span
                                            class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{ route('valueAdding') }}">
                        <div class="box-industries">
                            <div class="our-services-industries">
                                <div class="icon"><img src="{{asset('/images')}}/{{ $valueAddingMain->main_img  }}">
                                </div>
                                <div class="text">
                                    <h4>Value Added Services</h4>


                                    <?php
                                    $descsAdded = explode(" ", strip_tags($valueAddingMain->main_desc));
                                    $countAdded = count($descsAdded);

                                    ?>
                                    @if($countAdded <= 14)
                                            <?php $countWordsAdded = $countAdded - 2 ?>
                                    @else
                                            <?php $countWordsAdded = 15 ?>

                                    @endif
                                    <?php
                                    $firstPartAdded = implode(" ", array_splice($descsAdded, 0, $countWordsAdded));

                                    ?>

                                    <p> {!!html_entity_decode( $firstPartAdded)!!}...</p>


                                    <a href="{{ route('valueAdding') }}"
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

@extends('layouts.main')
@section('content')
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
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
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                    <div class="sc-services-details trucking  d-flex align-items-center wow fadeIn">


                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">

                            @foreach($depotServices as $service)

                                @if($service->depot_service_title)
                                    <h4>{{ $service->depot_service_title }}</h4>
                                @endif
                                <p> {!!html_entity_decode( $service->depot_service_desc)!!} </p>
                            @endforeach
                        </div>

                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <img class="mx-auto mt-auto mb-auto depot-img-new"
                                 src="{{asset('/images')}}/{{ $depotServiceImage->main_img  }}" alt=""
                                 style="background-color: #fff;">
                            <br>
                            <img class=" mx-auto mt-auto mb-auto"
                                 src="{{asset('/images')}}/{{ $depotServiceImage2->main_img  }}" alt=""
                                 style="background-color: #fff;">

                        </div>


                    </div>

                </div>

            </div>


        </div>
    </section>

@endsection

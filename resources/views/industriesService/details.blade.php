@extends('layouts.main')
@section('content')

    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--
<header class="top-area single-page" id="home">
    <div class="top-area-bg opacitynew" data-stellar-background-ratio="0.6" style="background-image: url('{{asset('/industriesService')}}/{{ $service->service_banner  }}');background-position: center;background-size: cover;"></div>
-->
    <div class="header-top-area">
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
    </div>
    <header class="top-area single-page" id="home">

        <div class="welcome-area"
             style="background-image: url('{{asset('/industriesService')}}/{{ $service->service_banner  }}');background-position: center;background-size: cover;">
            <div class="area-bg"></div>
            <div class="container">
                <!--
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text text-center">
                        <h2>{{$service->service_title}}</h2>
                    </div>
                </div>
            </div>
-->
            </div>
        </div>
    </header>
    <!--ABOUT AREA-->

    <!--SERVICES AREA-->
    <section class="blog-area blog-page section-padding">
        <div class="container">
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                        <h2>{{$service->service_title}}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <div class="shipping-service wow fadeIn">

                        <div class="shipping-service-details industrypage">
                            @foreach($service->industriesServiceDetails as $detail )
                                @if($detail->service_details_type =="paragraph")
                                    @if($detail->service_details_title)
                                        <h4>{{$detail->service_details_title}}</h4>
                                    @endif

                                    <p> {!!html_entity_decode( $detail->service_details_desc)!!} </p>

                                    <br/>
                                @else

                                    <h4>{{$detail->service_details_title}}</h4>



                                    <p> {!!html_entity_decode( $detail->service_details_desc)!!} </p>

                                    <br/>
                                @endif
                            @endforeach


                        </div>
                        @if(count($images) >=1)

                            <div id="images" class=" tab-pane">
                                <main class="main">
                                    <div class="container-fancy">
                                        @foreach($images as $image )

                                            <div class="card">
                                                <div class="card-image">
                                                    <a href="{{asset('/industriesService')}}/{{$image->industries_image_img}}"
                                                       data-fancybox="gallery">
                                                        <img
                                                            src="{{asset('/industriesService')}}/{{$image->industries_image_img}}"
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
                            <h4>Scope Of Activities</h4>
                            <ul>
                                @foreach($industryService->industriesService as $service)

                                    <li>
                                        <a href="{{ route('serviceDetails', $service->service_id) }}">{{$service->service_title}}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>
    <!--SERVICES AREA END-->

@endsection

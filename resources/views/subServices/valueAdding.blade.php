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
            <div class="area-bg"></div>
            <div class="container">
                <!--
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text text-center">
                        <h2>{{ $banner->title}}</h2>

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
                        <h2>{{ $banner->title}}</h2>

                    </div>
                </div>
            </div>


            <div class="row">


                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">

                    @foreach($valueAdding as $i=>$service)
                        <div class="tab-content sea-freight-content">

                            <div class="d-flex align-items-center" id="Service-{{$i}}">
                                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                                    <h3>{{$service->value_adding_title}}</h3>
                                    <div class="sea-freigt-details">
                                        <p> {!!html_entity_decode( $service->value_adding_desc_paragraph)!!} </p>
                                        <br>
                                        <h4>{{ $service->value_adding_desc_title2}}</h4>
                                        <p> {!!html_entity_decode( $service->value_adding_desc_list)!!} </p>
                                    </div>
                                </div>


                                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                    <div class="sea-freigt-details">
                                        <img src="{{asset('/serviceImages')}}/{{ $service->value_adding_img  }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">

                        <div class="single-sidebar-widget widget_categories" id="new-sidebar">
                            <h4>Other Logistics Services</h4>
                            <ul>
                                <li><a href="{{ route('seaFreight') }}">Sea Freight Services</a></li>
                                <li><a href="{{ route('trucking') }}">Trucking Services</a></li>
                                <li><a href="{{ route('valueAdding') }}">Value Added Services</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@extends('layouts.main')
@section('content')
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>
    <!--    <div class="top-area-bg" data-stellar-background-ratio="0.6" style="background-image:url('{{asset('themes/theme_en/img/calculator.png')}}');background-position: center;background-size: cover;"></div>-->
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
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <!--
                    <div class="welcome-text text-center">
                        <h2>{{ $banner->banner_title }}</h2>
                    </div>
-->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--ABOUT AREA-->

    <section class="about-area section-padding">
        <div class="about-area-portion">
            <div class="container">
                <div class="row">

                    <div class="text-center">
                        <h2>{{ $banner->banner_title }}</h2>
                    </div>
                    <!--
                                    <div class="center-portion-about">
                                        <p>
                                           <i class="fas fa-quote-left firstquote"></i> sddddddddddddddddd<i class="fas fa-quote-right secondquote"></i>
                                            <p>

                                    </div>
                    -->

                </div>
            </div>
        </div>
    </section>

    <div class="fullwidth">
        <div
            class="vc_row wpb_row vc_row-fluid foreground-color-45 about-block rtl-rotate-background vc_custom_1473757893014 vc_row-has-fill"
            style="background-image:url('{{asset('themes/theme_en/img/photo.jpg')}}');">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <div class="container-fluid">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid rtl-rotate-background-return">
                                <div
                                    class="col-md-8 col-sm-12 pd-50-30 wpb_column vc_column_container vc_col-sm-8 vc_col-has-fill">
                                    <div class="vc_column-inner vc_custom_1473321151448">
                                        <div class="wpb_wrapper">
                                            @foreach($allAbout as $i => $aboutUs)

                                                <h2>{{ $aboutUs->about_title }}</h2>
                                                <p class="inner-p">{!!html_entity_decode($aboutUs->about_desc)!!}</p>
                                                <hr>

                                                <!-- <h2> OUR TEAM</h2>
                                                <p class="inner-p">EgyMar is a licensed Suez Canal Transit and ship agent for all type vessels. Our team of full time employed professional supervisors working 24/7 at all Egyptian ports through EgyMar own offices in Alexandria, Port Said, Damietta and Suez, have long years’ experience in handling all agency and husbandry requirements for our customers. Our Fully owned subsidiary New Oceanic L.L.C. is also a licensed ship agent for all size vessels offering ship owners, exporters and importers our integrated shipping and logistics services in DP world ports in UAE and professionally handling cargo delivery to all GCC destinations.</p> -->
                                            @endforeach

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12 wpb_column vc_column_container vc_col-sm-4">
                                    <div class="vc_column-inner vc_custom_1472523849454">
                                        <div class="wpb_wrapper">
                                            <div class="g5plus-heading heading-lg frame-35 heading-full text-left dark">
                                                <div class="text-heading">
                                                    <h2 class="heading-title fw-extra-bold"> {{ $allAbout2[0]->about_title }}</h2>
                                                    <div class="heading-frame frame-right"></div>
                                                </div>
                                            </div>
                                            <div
                                                class="wpb_text_column wpb_content_element vc_custom_1472524013703 text-color-white">
                                                <div class="wpb_wrapper text-color-white">
                                                    <p>{!!html_entity_decode($allAbout2[0]->about_desc)!!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="space"></div>



    @if($certificateAppear->certificate_appear_in_about == "yes")

        <section class="clients-area section-padding wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                        <div class="about-content-area wow fadeIn">
                            <div class="clients-title">
                                <h2 class="">Membership & certifications</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="client-list">
                            @foreach($certificates as $certificate)
                                <div class="single-client">
                                    <a target="_blank" href="{{$certificate->certificate_link}}"> <img
                                            src="{{asset('/certificateImages')}}/{{$certificate->certificate_image}}"
                                            alt=""></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    @endif
@endsection

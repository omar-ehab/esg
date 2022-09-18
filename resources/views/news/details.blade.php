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


    <?php
    $descs = explode(" ", html_entity_decode($news->news_desc));
    $firstPart = implode(" ", array_splice($descs, 0, 17));
    $type = mb_detect_encoding(html_entity_decode($firstPart));
    ?>
    @if($type =='ASCII')
        <section class="blog-area blog-page news-page section-padding">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $news->news_title }}</h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                        <div class="sc-services-details wow fadeIn">


                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <img src="{{asset('/newsImages')}}/{{$news->news_img}}" alt="">
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                                <p> {!!html_entity_decode( $news->news_desc)!!} </p>

                                <hr>

                            </div>


                        </div>

                    </div>

                </div>


            </div>
        </section>
    @else
        <section class="blog-area blog-page news-page arabic-details section-padding">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $news->news_title }}</h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                        <div class="sc-services-details wow fadeIn">


                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <img src="{{asset('/newsImages')}}/{{$news->news_img}}" alt="">
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                                <p> {!!html_entity_decode( $news->news_desc)!!} </p>

                                <hr>

                            </div>


                        </div>

                    </div>

                </div>


            </div>
        </section>
    @endif
@endsection

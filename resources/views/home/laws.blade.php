@extends('layouts.main')
@section('content')
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--<header class="top-area single-page" id="home">-->
    <!--    <div class="top-area-bg" data-stellar-background-ratio="0.6" style="background-image: url('{{asset('themes/theme_en/img/calculator.png')}}');background-position: center;background-size: cover;"></div>-->
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
                                        <h2>Maritime Law</h2>
                                    </div>
                                </div>
                            </div>
                -->
            </div>
        </div>
    </header>

    <!--SERVICES AREA-->
    <section class="blog-area blog-page linksnew section-padding gray-bg">
        <div class="container">

            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="welcome-text-law text-center">
                        <h2>Maritime Law</h2>
                    </div>
                </div>
            </div>

            <?php $count = count($usefulLinks); ?>
            <?php $elementsPerRow = 4; ?>
            <?php for ($i = 0;
                       $i < $count / $elementsPerRow;
                       $i++): ?>

            <div class="row">
                    <?php for ($j = $i * $elementsPerRow;
                               $j < $elementsPerRow * ($i + 1);
                               $j++): ?>
                    <?php if (isset($usefulLinks[$j])): ?>
                    <?php $usefulLink = $usefulLinks[$j]; ?>

                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="client-promo useful-links-law">
                        <a target="_blank" href="{{ route('Laws') }}">

                            <a target="_blank" href="{{route('downloadLawFile',$usefulLink->useful_links_id)}}">

                                <span>
                                    {{ $usefulLink->useful_links_title }} <i class="fas fa-download"></i>
                                </span>
                                <span>
                                    <i class="far fa-file-pdf" aria-hidden="true"></i>
                                </span>
                            </a>


                        </a>
                    </div>
                </div>
                <?php endif; ?>
                <?php endfor; ?>

            </div>
            <?php endfor; ?>


        </div>

    </section>
    <!--SERVICES AREA END-->

@endsection

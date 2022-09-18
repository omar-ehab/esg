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
                        <h2>{{ $banner->banner_title }}</h2>
                    </div>
                </div>
            </div>
            -->
            </div>
        </div>
    </header>

    <!--SERVICES AREA-->
    <section class="blog-area blog-page news-page section-padding gray-bg">
        <div class="container">
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                        <h2>{{ $banner->banner_title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($news as $n)
                        <?php
                        $type = mb_detect_encoding($n->news_desc);
                        $descs = explode(" ", strip_tags($n->news_desc));
                        $firstPart = implode(" ", array_splice($descs, 0, 17));
                        ?>
                    @if($type =='ASCII')
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="shipping-service wow fadeIn">
                                <div class="blog-image newspageblog">
                                    <img src="{{asset('/newsImages')}}/{{$n->news_img}}" alt="">
                                </div>
                                <div class="news-service-details">
                                    <h3><a>{{$n->news_title}}</a></h3>
                                    <div class="blog-meta"><a>{{date(' N F Y', strtotime($n->news_date))}}</a></div>


                                    <p>
                                        {!!html_entity_decode($firstPart)!!}
                                    </p>


                                    <a href="{{ route('newsDetails', $n->news_id) }}"
                                       class="flex flex-row items-center mt-3 more-news"> <span
                                            class="ml-2">Learn more</span> <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="shipping-service arabic wow fadeIn">
                                <div class="blog-image newspageblog">
                                    <img src="{{asset('/newsImages')}}/{{$n->news_img}}" alt="">
                                </div>
                                <div class="news-service-details arabic">
                                    <h3><a>{{$n->news_title}}</a></h3>
                                        <?php
                                        $months = array(
                                            '01' => 'يناير',
                                            '02' => 'فبراير',
                                            '03' => 'مارس',
                                            '04' => 'ابريل',
                                            '05' => 'مايو',
                                            '06' => 'يونيو',
                                            '07' => 'يوليو',
                                            '08' => 'اغسطس',
                                            '09' => 'سبتمبر',
                                            '10' => 'اكتوبر',
                                            '11' => 'نوفمبر',
                                            '12' => 'ديسمبر',
                                        )
                                        ?>


                                        <?php $month = date("m", strtotime($n->news_date)); ?>
                                    <div class="blog-meta arabic">
                                        <a>{{date(' N', strtotime($n->news_date))}} {{$months[$month]}} {{date('Y', strtotime($n->news_date))}}</a>
                                    </div>
                                    <p></p>


                                    <p>
                                        {!!html_entity_decode($firstPart)!!}
                                    </p>


                                    <a href="{{ route('newsDetails', $n->news_id) }}"
                                       class="flex flex-row items-center mt-3 more-news"> <span
                                            class="ml-2">المزيد</span> <i class="fa fa-arrow-left"></i> </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>

    </section>
    <!--SERVICES AREA END-->

@endsection

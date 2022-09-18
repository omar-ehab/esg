@extends('layouts.main')
@section('content')
    @section('page_title')
        {{$title}}
    @endsection





    <!--
<div class="lightbox wow fadeInUp" data-wow-delay="2s">
  <div class="iframeContainer">
    <div class="toolbarLB">
      <span class="closeLB" onclick="lightBoxClose()">x</span>
    </div>
<img src="https://www.searates.com/design/images/import/blog/0.48318200%201583830159.jpg">
<h2>Title</h2>
<p>It just makes you want to close the lightbox so I can get it!It just makes you want to close the lightbox so I can get it!It just makes you want to close the lightbox so I can get it!
</p>
  </div>
</div>
-->

    <!--
    <div id="popup_this">
        <span class="button b-close">
            <span>X</span>
        </span>
        <h3>A nice ad goes here!</h3>
        <p>Nulla at nunc posuere, dictum sem sed, tristique mi.</p>
    </div>
    -->
    @if($homePopUp->pop_up_display ==1)
        @if($homePopUp->pop_up_display_image ==1)

            <div id="boxes">
                <div id="dialog" class="window">
                    <!--      <div class="overlay"></div>-->
                    <span class="button b-close">
            <span>X</span>
        </span>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style=" display: flex;
             justify-content: center;
             /* align-items: center; */
             height: -webkit-fill-available;
             flex-direction: column;">
                        <img class="mx-auto mt-auto mb-auto"
                             src="{{asset('/popUpImages')}}/{{ $homePopUp->pop_up_image }}">
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="    display: flex;
             justify-content: center;
             /* align-items: center; */
             height: -webkit-fill-available;
             flex-direction: column;">
                        <h2><?php echo $homePopUp->pop_up_title ?></h2>
                        <p><?php echo $homePopUp->pop_up_desc ?></p>
                    </div>


                </div>
                <div id="mask"></div>
            </div>
        @else
            <div id="boxes">
                <div id="dialog" class="window dialogImage">
                    <!--      <div class="overlay"></div>-->
                    <span class="button b-close">
            <span>X</span>
        </span>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="   display: flex;
             justify-content: center;
             /* align-items: center; */
             height: -webkit-fill-available;
             flex-direction: column;">
                        <img class="mx-auto mt-auto mb-auto"
                             src="{{asset('/popUpImages')}}/{{ $homePopUp->pop_up_image }}">
                    </div>


                </div>
                <div id="mask"></div>
            </div>

        @endif
    @endif



    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>



    <!--SCROLL TO TOP-->

    <!--START TOP AREA-->
    <!--<header class="top-area" id="home">-->
    <!--    <div class="top-area-bg" data-stellar-background-ratio="0.6"></div>-->
    <div class="header-top-area hometop">
        <!--    <div class="header-top-area">-->
        <!--MAINMENU AREA-->
        <div class="mainmenu-area homemenu" id="mainmenu-area">
            <!--        <div class="mainmenu-area" id="mainmenu-area">-->
            <div class="mainmenu-area-bg"></div>
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{route('homepage')}}" class="navbar-brand off"><img
                                src="{{asset('themes/theme_en/img/logo-white.png')}}" alt="logo"></a>
                        <a href="{{route('homepage')}}" class="navbar-brand on"><img
                                src="{{asset('themes/theme_en/img/egymar-logo.png')}}" alt="logo"></a>
                    </div>
                    @include('search.search')


                </div>

            </nav>
        </div>
        <!--END MAINMENU AREA END-->
    </div>


    <!--START TOP AREA-->
    <header class="top-area" id="home">
        <!--HOME SLIDER AREA-->
        <div class="welcome-slider-area">
            @foreach($homeSliders as $homeSlider)

                <div class="welcome-single-slide slider-bg-one"
                     style="background: url({{asset('/sliderImages')}}/{{ $homeSlider->home_slider_image }});">

                    <div class="container">
                        <div class="row flex-v-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="col-lg-8 col-md-6 col-xs-12 col-sm-12">
                                    <div class="welcome-text text-left">
                                        @if($homeSlider->home_slider_title)
                                            <h1>{{ $homeSlider->home_slider_title }}</h1>
                                        @endif
                                        @if($homeSlider->home_slider_desc)
                                            <p>{{ $homeSlider->home_slider_desc }}</p>
                                        @endif

                                        <div class="home-button">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!--END HOME SLIDER AREA-->


    </header>
    <!--END TOP AREA-->

    <section>
        <div class="inquiry-area zim-section">
            <div class="container">
                <div class="col-md-12 col-lg-12 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                    <div class="left-portion">
                        <h2 class="zim">EgyMar is the exclusive agent for zim line in egypt</h2>
                    </div>

                    <div class="right-portion">
                        <img src="{{asset('themes/theme_en/img/logo-zim.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--video area-->

    <section class="service-area videoarea"
             style="background-image: url({{asset('themes/theme_en/img/welcome.png')}});">
        <div class="service-top-area padding-top3 video-overlay">
            <div class="container">
                <div class="row justify">
                    <div class="col-md-6 col-lg-6 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                        <div class="section-title mb-30 text-left">
                            <div class="about-content-area wow fadeIn">
                                <div class="about-content">
                                    <h2>Welcome TO <span>EgyMar</span></h2>
                                    <p>{{ $welcome->welcome_desc }}</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                        <div class="relative-boxvideo">
                            <?php $url = $welcome->welcome_video_link ?>
                            <?php
                            $url = str_replace("watch?v=", "embed/", $url);
                            ?>
                            <?php $videoArr = (explode('/', $url)); ?>
                            <?php $code = end($videoArr); ?>

                            <img src="https://img.youtube.com/vi/<?php echo $code ?>/0.jpg">
                            <div class="play-video text-center"><a class="view-video popup-youtube" href="javascript:; "
                                                                   data-toggle="modal" data-target="#exampleModalvideo">
                                    <i class="fa fa-play"></i> </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end video area-->
    <!--    modal for video-->
    <div class="modal fade" id="exampleModalvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modalvideo" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <?php $url = $welcome->welcome_video_link ?>
                    <?php
                    $url = str_replace("watch?v=", "embed/", $url);
                    ?>
                    <iframe width="100%" height="500" src="{{$url}}?autoplay=1&loop=1" frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <section class="service-area">
        <div class="service-top-area padding-top2">
            <div class="col-md-12 col-lg-12 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                <div class="about-content-area wow fadeIn">
                    <div class="title-services">
                        <h2>Our Integrated Services</h2>
                    </div>
                </div>
            </div>

            <div class="container-service">
                @foreach($services as $service)

                    <div class="col-md-3 col-lg-3 col-xs-6 col-sm-6 hover-blur">

                        @if($service->service_id == 1)

                            <div class="box">
                                <a href="{{ route('shipping') }} " title="">
                                    <img src="{{asset('/serviceImages')}}/{{ $service->service_image }}" alt=""/>
                                    <h2><span class="text-white"><i class="fa fa-link"></i></span></h2>
                                </a>
                                <a href="{{ route('shipping')}}">
                                    <h4 class="text-center service-name">{{ $service->service_name }}</h4>
                                </a>
                            </div>

                        @elseif($service->service_id == 2)
                            <div class="box">
                                <a href="{{ route('logistics') }} " title="">
                                    <img src="{{asset('/serviceImages')}}/{{ $service->service_image }}" alt=""/>
                                    <h2><span class="text-white"><i class="fa fa-link"></i></span></h2>
                                </a>
                                <a href="{{ route('logistics') }}">
                                    <h4 class="text-center service-name">{{ $service->service_name }}</h4>
                                </a>
                            </div>
                        @elseif($service->service_id == 3)
                            <div class="box">
                                <a href="{{ route('suezCanal') }} " title="">
                                    <img src="{{asset('/serviceImages')}}/{{ $service->service_image }}" alt=""/>
                                    <h2><span class="text-white"><i class="fa fa-link"></i></span></h2>
                                </a>
                                <a href="{{ route('suezCanal') }}">
                                    <h4 class="text-center service-name">{{ $service->service_name }}</h4>
                                </a>
                            </div>
                        @else
                            <div class="box">
                                <a href="{{ route('depotStorage') }} " title="">
                                    <img src="{{asset('/serviceImages')}}/{{ $service->service_image }}" alt=""/>
                                    <h2><span class="text-white"><i class="fa fa-link"></i></span></h2>
                                </a>
                                <a href="{{ route('depotStorage') }}">
                                    <h4 class="text-center service-name">{{ $service->service_name }}</h4>
                                </a>
                            </div>
                        @endif

                    </div>

                @endforeach


            </div>
        </div>

    </section>
    <!--industry AREA-->

    <section class="promo-area">
        <div class="promo-top-area section-padding wow fadeIn">
            <div class="container">

                <div class="col-md-12 col-lg-12 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                    <div class="about-content-area wow fadeIn">
                        <div class="title-served">
                            <h2>Scope of activities </h2>
                        </div>
                    </div>
                </div>


                <div class="row">
                    @foreach($industryService->industriesService as $i=> $service)
                        @if($i < 6)
                                <?php //$word = str_word_count($service->service_title);
                                ?>
                            <div class="col-md-2 col-lg-1 col-sm-6 col-xs-6 industrybox scope">
                                <a href="{{ route('serviceDetails', $service->service_id) }}">
                                    <div class="single-promo">
                                        <div class="promo-icon"><img
                                                src="{{asset('/industriesService')}}/{{$service->service_icon}}"></div>
                                        <div class="promo-details">
                                                <?php
                                                $arr = explode(' ', trim($service->service_title));
                                                ?>
                                            @if(count($arr) ==1)
                                                <h3><?php echo $arr[0] ? $arr[0] : ""; ?></h3>
                                            @elseif(count($arr) ==2)
                                                <h3><?php echo $arr[0] ? $arr[0] : ""; ?>
                                                    <br/><?php echo $arr[1] ? $arr[1] : ""; ?></h3>
                                            @elseif(count($arr) ==3)
                                                <h3><?php echo $arr[0] ? $arr[0] : ""; ?><?php echo $arr[1] ? $arr[1] : ""; ?>
                                                    <br/> <?php echo $arr[2] ? $arr[2] : ""; ?> </h3>
                                            @elseif(count($arr) ==4)
                                                <h3><?php echo $arr[0] ? $arr[0] : ""; ?><?php echo $arr[1] ? $arr[1] : ""; ?>
                                                    <br/> <?php echo $arr[2] ? $arr[2] : ""; ?><?php echo $arr[3] ? $arr[3] : ""; ?>
                                                </h3>

                                            @endif

                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif

                    @endforeach
                </div>


                <div class="row">
                    @foreach($industryService->industriesService as $i=> $service)
                        @if($i >= 6)
                                <?php //$word = str_word_count($service->service_title);
                                ?>
                            <div class="col-md-2 col-lg-1 col-sm-6 col-xs-6 industrybox scope">
                                <a href="{{ route('serviceDetails', $service->service_id) }}">
                                    <div class="single-promo">
                                        <div class="promo-icon"><img
                                                src="{{asset('/industriesService')}}/{{$service->service_icon}}"></div>
                                        <div class="promo-details">
                                                <?php
                                                $arr = explode(' ', trim($service->service_title));
                                                ?>
                                            @if(count($arr) ==1)
                                                <h3><?php echo $arr[0] ? $arr[0] : ""; ?></h3>
                                            @elseif(count($arr) ==2)
                                                <h3><?php echo $arr[0] ? $arr[0] : ""; ?>
                                                    <br/><?php echo $arr[1] ? $arr[1] : ""; ?></h3>
                                            @elseif(count($arr) ==3)
                                                <h3><?php echo $arr[0] ? $arr[0] : ""; ?><?php echo $arr[1] ? $arr[1] : ""; ?>
                                                    <br/> <?php echo $arr[2] ? $arr[2] : ""; ?> </h3>
                                            @elseif(count($arr) ==4)
                                                <h3><?php echo $arr[0] ? $arr[0] : ""; ?><?php echo $arr[1] ? $arr[1] : ""; ?>
                                                    <br/> <?php echo $arr[2] ? $arr[2] : ""; ?><?php echo $arr[3] ? $arr[3] : ""; ?>
                                                </h3>

                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>

    </section>
    <!--INDUSTRY AREA-->

    <!--BLOG AREA-->
    @if($news)

        <section class="blog-area padding-top-news">
            <div class="container">

                <div class="col-md-12 col-lg-12 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                    <div class="about-content-area wow fadeIn">
                        <div class="title-news">
                            <h2>Latest News</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <?php
                        $type = mb_detect_encoding($news->news_desc);

                        $descs = explode(" ", strip_tags($news->news_desc));
                        $firstPart = implode(" ", array_splice($descs, 0, 50));
                        ?>
                    @if($type =='ASCII')

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="single-blog wow fadeInUp" data-wow-delay="0.2s">
                                <div class="blog-image">
                                    <img src="{{asset('/newsImages')}}/{{$news->news_img}}" alt="">

                                </div>
                                <div class="blog-details text-left">
                                    <div class="blog-meta"><a href="{{ route('newsDetails', $news->news_id) }}">
                                            <p>{{date(' jS F Y', strtotime($news->news_date))}}</p>
                                        </a></div>
                                    <h3><a href="{{ route('newsDetails', $news->news_id) }}">{{$news->news_title}}</a>
                                    </h3>
                                    <p> {!!html_entity_decode( $firstPart)!!} ...</p>
                                    <a href="{{ route('newsDetails', $news->news_id) }}">See More &nbsp;<i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                            <div class="more-news-area wow fadeIn">
                                <a class="more-news" href="{{route('news')}}"> More News</a>
                            </div>
                        </div>

                    @else

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="single-blog arabic wow fadeInUp" data-wow-delay="0.2s">
                                <div class="blog-image">
                                    <img src="{{asset('/newsImages')}}/{{$news->news_img}}" alt="">

                                </div>
                                <div class="blog-details text-right">
                                    <div class="blog-meta"><a href="{{ route('newsDetails', $news->news_id) }}">
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


                                                <?php $month = date("m", strtotime($news->news_date)); ?>
                                            <p>{{date(' N', strtotime($news->news_date))}} {{$months[$month]}} {{date('Y', strtotime($news->news_date))}}</p>
                                        </a></div>
                                    <h3><a href="{{ route('newsDetails', $news->news_id) }}">{{$news->news_title}}</a>
                                    </h3>
                                    <p> {!!html_entity_decode( $firstPart)!!} ...</p>
                                    <a href="{{ route('newsDetails', $news->news_id) }}">المزيد &nbsp;<i
                                            class="fa fa-angle-left"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                            <div class="more-news-area wow fadeIn">
                                <a class="more-news arabic" href="{{route('news')}}"> المزيد من الاخبار </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    <!--BLOG AREA END-->
    <!--MEMBERSHIP AREA-->
    <section class="promo-area useful-section">
        <div class="promo-bottom-area section-padding4">
            <div class="promo-botton-area-bg" data-stellar-background-ratio="0.6"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">
                        <div class="about-content-area wow fadeIn">
                            <div class="title-served">
                                <h2>Useful Information</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">

                        <div class="client-promo useful-links">
                            <a href="{{route('ports')}}">
                                <img src="{{asset('themes/theme_en/img/port.jpg')}}">
                                <h3> Egyptian Sea Ports</h3>
                            </a>
                        </div>

                    </div>

                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                        <div class="client-promo useful-links">
                            <a href="{{ route('scConvoy') }}">
                                <img src="{{asset('themes/theme_en/img/useful-links.png')}}">
                                <h3>Suez Canal</h3>
                            </a>

                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                        <div class="client-promo useful-links">
                            <a href="{{ route('Laws') }}">
                                <img src="{{asset('themes/theme_en/img/law.png')}}">
                                <h3>Maritime Law</h3>
                            </a>

                        </div>
                    </div>


                </div>


            </div>
        </div>
    </section>

    <!--MEMBERSHIP AREA END-->

    <section class="calculator-mobile">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="toll-slider">
                    <p>Suez Canal Toll Calculator</p>
                    <img src="{{asset('themes/theme_en/img/suez-canal.png')}}">
                    <a href="{{route('suezCanalCalculator')}}" class="btn-calculator">Calculate <i
                            class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section>


        <div class="inquiry-area">
            <div class="container">
                <div class="left-portion inquiryleft">
                    <p>
                        <i class="far fa-edit"></i> &nbsp;Have questions? <a href="javascript:;" data-toggle="modal"
                                                                             data-target="#exampleModalCenter"
                                                                             id="inquiry">send us an enquiry</a>
                        and we will get back to you
                    </p>

                </div>
                <div class="right-portion inquiryright">
                    <ul class="nav-bottons">

                        <li><a href="callto:{{$contact->contact_us_phone1}}" data-toggle="modal"
                               data-target="#exampleModalmobile" class="btn btn-default btn-lg"><i
                                    class="fas fa-phone"></i> &nbsp; Call Us</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </section>

    <!--    modal for number-->
    <div class="modal fade" id="exampleModalmobile" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="modal-title phone" id="exampleModalLongTitle"><i class="fas fa-phone"></i><a
                                    href="tel:{{$contact->contact_us_phone1}}"> {{$contact->contact_us_phone1}} </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--    modal for form-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">MAKE AN ENQUIRY</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{route('inquiryForm')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 logincolumn">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Full Name</label>
                                    <input type="text" class="form-control" id="recipient-name"
                                           name="enquiry_form_full_name" value="{{ old('enquiry_form_full_name') }}"
                                           required="required">
                                    <span class="text-danger">{{ $errors->first('enquiry_form_full_name') }}</span>

                                </div>

                                <div class="form-group">
                                    <label for="mobile-number" class="col-form-label">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile-number"
                                           name="enquiry_form_phone_num" value="{{ old('enquiry_form_phone_num') }}"
                                           onkeyup="validatePhone()" required="required">
                                    <span class="text-danger">{{ $errors->first('enquiry_form_phone_num') }}</span>

                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="enquiry_form_email"
                                           value="{{ old('enquiry_form_email') }}" required="required">
                                    <span class="text-danger">{{ $errors->first('enquiry_form_email') }}</span>

                                </div>

                                <div class="form-group">
                                    <label for="company-name" class="col-form-label">Company Name</label>
                                    <input type="text" class="form-control" id="company-name"
                                           name="enquiry_form_company_name"
                                           value="{{ old('enquiry_form_company_name') }}" required="required">

                                    <span class="text-danger">{{ $errors->first('enquiry_form_company_name') }}</span>

                                </div>

                                <div class="form-row">
                                    <div class="form-input" style="margin-left: 0; margin-top:0%;">
                                        <div>{!! htmlFormSnippet() !!}</div>
                                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>

                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-6 logincolumn">
                                <div class="form-group">
                                    <label for="mobile-number" class="col-form-label">Services</label>
                                    <div class="form-holder modelenquiry">

                                        <select class="form-control" id="exampleFormControlSelect1"
                                                name="enquiry_form_service_id" required="required">
                                            <option value="">Select Service</option>

                                            @foreach($serviceInquiry as $service)

                                                <option
                                                    value="{{$service->service_id}} " {{(old('enquiry_form_service_id') == $service->service_id) ? 'selected' : '' }}> {{$service->service_name}}</option>
                                            @endforeach

                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                        <span class="text-danger">{{ $errors->first('enquiry_form_service_id') }}</span>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="mobile-number" class="col-form-label">Country</label>
                                    <div class="form-holder modelenquiry">

                                        <select class="form-control" id="exampleFormControlSelect1" name="country_id"
                                                required="required">
                                            <option value="">Select Country</option>

                                            @foreach($countries as $country)
                                                <option
                                                    value="{{$country->country_id}}" {{(old('country_id') == $country->country_id) ? 'selected' : '' }}>{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                        <i class="fas fa-chevron-down"></i>
                                        <span class="text-danger">{{ $errors->first('country_id') }}</span>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Enquiry:</label>
                                    <textarea class="form-control feedback" id="message-text"
                                              name="enquiry_form_enquiry"
                                              required="required">{{ old('enquiry_form_enquiry') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('enquiry_form_enquiry') }}</span>

                                </div>


                            </div>

                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            <?php if (count($errors) > 0) : ?>
            $("#inquiry").click();
            <?php endif; ?>
        });

        function validatePhone() {
            var mobNum = $('#mobile-number').val();
            var filter = /^[0-9\+\-][0-9]*$/;

            if (filter.test(mobNum)) {
                //            $("#phoneError").css("display", "none");


            } else {
                var phonenum = mobNum.slice(0, -1);
                $('#mobile-number').val(phonenum);

                //                $("#phoneError").css("display", "block");

                //              return false;
            }
        }
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <script>
        $(document).ready(function () {

            var id = '#dialog';

//Get the screen height and width
            var maskHeight = $(document).height();
            var maskWidth = $(window).width();

//Set heigth and width to mask to fill up the whole screen
            $('#mask').css({'width': maskWidth, 'height': maskHeight});

//transition effect
            $('#mask').fadeIn(500);
            $('#mask').fadeTo("slow", 0.9);


//Get the window height and width
            var winH = $(window).height();
            var winW = $(window).width();

//Set the popup window to center
//$(id).css('top',  winH/2-$(id).height()/2);
//$(id).css('left', winW/2-$(id).width()/2);

//transition effect
            $(id).fadeIn(2000);

//if close button is clicked
            $('.window .b-close').click(function (e) {
//Cancel the link behavior
                e.preventDefault();

                $('#mask').hide();
                $('.window').hide();
            });

//if mask is clicked
            $('#mask').click(function () {
                $(this).hide();
                $('.window').hide();
            });


        });
    </script>
    <script>


        function setCookie(cookieName, cookieValue, numdaystilexpireasinteger) {
            var d = new Date();
            d.setTime(d.getTime() + (numdaystilexpireasinteger * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
        }

        function getCookie(cookieName) {
            var name = cookieName + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function showLaw() {
            var x = getCookie("cookieName");  //call cookie to get its value
            if (x != "") {
                $("#lawmsg").remove();
            } else {
                setCookie("cookieName", "cookieValue", 2);
            }
        }

    </script>

@endsection

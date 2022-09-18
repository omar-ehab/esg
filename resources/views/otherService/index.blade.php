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

            @if($countDetails > 1)
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <ul class="sea-freight-tabs flex-column">
                            @foreach($serviceDetails as $i=>$service)
                                <li class="{{$i == 0 ? "active" : ""}}"><a data-toggle="tab"
                                                                           href="#Service-{{$i}}">{{$service->other_service_details_name}} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">

                        <div class="tab-content sea-freight-content">


                            @foreach($serviceDetails as $i=>$service)
                                <div id="Service-{{$i}}" class="tab-pane fade in {{$i == 0 ? "active" : ""}}">
                                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">

                                        <div class="sea-freigt-details">
                                            <h4>{{ $service->other_service_details_paragraph_title}}</h4>

                                            <p> {!!html_entity_decode( $service->other_service_details_paragraph)!!} </p>
                                            <br>

                                            <h4>{{ $service->other_service_details_list_title}}</h4>
                                            <p> {!!html_entity_decode( $service->other_service_details_list)!!} </p>

                                        </div>
                                    </div>


                                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                        <div class="sea-freigt-details">
                                            <img
                                                src="{{asset('/serviceImages')}}/{{ $service->other_service_details_img  }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                        @if($images)
                            <div id="images" class=" tab-pane">
                                <main class="main">
                                    <div class="container-fancy">
                                        @foreach($images as $image)
                                            <div class="card">
                                                <div class="card-image">
                                                    <a href="{{asset('/serviceImages')}}/{{ $image->other_service_image_img  }}"
                                                       data-fancybox="gallery">
                                                        <img
                                                            src="{{asset('/serviceImages')}}/{{ $image->other_service_image_img  }}"
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
            @else
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                        <div class="sc-services-details trucking wow fadeIn">
                            <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">

                                @foreach($serviceDetails as $service)
                                    <h4>{{ $service->other_service_details_paragraph_title }}</h4>
                                    @if( $service->other_service_details_paragraph)
                                        <p><?php echo nl2br($service->other_service_details_paragraph) ?></p>
                                    @endif

                                    <h4>{{ $service->other_service_details_list_title }}</h4>

                                    @if( $service->other_service_details_list)

                                            <?php
                                            $desc = $service->other_service_details_list;
                                            $lists = explode("*", $desc);
                                            // dd($rows);
                                            ?>

                                        <ul>
                                            @foreach($lists as $list)
                                                @if( $list)

                                                    <li> {{ $list }}</li>
                                                @endif

                                            @endforeach

                                        </ul>

                                    @endif
                                    <hr>

                                @endforeach
                            </div>
                            <br>
                            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                <img src="{{asset('/serviceImages')}}/{{ $service->other_service_details_img  }}"
                                     alt="">
                            </div>
                        </div>
                        @if($images)
                            <div id="images" class=" tab-pane">
                                <main class="main">
                                    <div class="container-fancy fancynew">
                                        @foreach($images as $image)
                                            <div class="card">
                                                <div class="card-image">
                                                    <a href="{{asset('/serviceImages')}}/{{ $image->other_service_image_img  }}"
                                                       data-fancybox="gallery">
                                                        <img
                                                            src="{{asset('/serviceImages')}}/{{ $image->other_service_image_img  }}"
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

            @endif

        </div>


    </section>

@endsection

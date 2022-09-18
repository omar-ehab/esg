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




    <section class="about-area gray-bg section-padding">
        <div class="about-area-portion">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $banner->banner_title}}</h2>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <video controls="" autoplay="" class="sc-video">
                            <source src="{{asset('/video')}}/{{ $scConvoyVideo->video_video  }}" type="video/mp4">
                        </video>
                        <p class="copyright-video"> copyrights Suez Canal Authority</p>
                    </div>
                </div>

                <div class="box-white">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="text-center mt-5">
                                <h1>ABOUT SUEZ CANAL</h1>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        @foreach($scConvoy as $i=>$service)

                            @if($service->sc_convoy_desc_table)

                                <div class="col-lg-12 col-md-12">
                                    <div
                                        class="{{ $service->sc_convoy_has_header == "yes" ? "sc-content" : "col-lg-12 col-md-12 SC-list" }}">
                                        <h3>{{ $service->sc_convoy_title }}</h3>
                                            <?php
                                            $descTable = $service->sc_convoy_desc_table;
                                            $rows = explode("**", $descTable);
                                            ?>

                                        @if($service->sc_convoy_has_header == "yes")
                                            <table border="1" cellpadding="0" cellspacing="0" class="movie-table">
                                                @foreach($rows as $i=> $row)
                                                    @if($row)

                                                            <?php
                                                            $cols = explode("*", $row);
                                                            ?>

                                                        @if($i == 1)

                                                            <thead role="rowgroup">
                                                            <tr>
                                                                @foreach($cols as $col)

                                                                    <th><strong>{{ $col }}</strong></th>
                                                                @endforeach

                                                            </tr>
                                                            </thead>
                                                        @else
                                                            <tr>
                                                                @foreach($cols as $col)

                                                                    <td valign="middle">

                                                                        <div><span dir="ltr">{{ $col }}</span></div>

                                                                    </td>
                                                                @endforeach

                                                            </tr>
                                                        @endif

                                                    @endif
                                                @endforeach

                                            </table>

                                        @else

                                            <table border="1" cellpadding="0" cellspacing="0" id="current">
                                                @foreach($rows as $i=> $row)
                                                    @if($row)

                                                            <?php
                                                            $cols = explode("*", $row);
                                                            ?>
                                                        <tr>
                                                            @foreach($cols as $j=>$col)

                                                                <td width="{{ ($j == 1) ? 134 : 339 }}" valign="middle">
                                                                    <div align="left">{{ $col }}</div>
                                                                </td>
                                                            @endforeach

                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>

                                        @endif
                                        <hr>

                                    </div>

                                </div>
                            @elseif($service->sc_convoy_desc_list && $service->sc_convoy_desc_table == NULL && $service->sc_convoy_desc_paragraph== NULL)
                                <div class="col-lg-12 col-md-12 SC-list">

                                    <h3>{{$service->sc_convoy_title}}</h3>
                                    <p> {!!html_entity_decode( $service->sc_convoy_desc_list)!!} </p>
                                    <hr>
                                </div>

                            @elseif($service->sc_convoy_desc_paragraph && $service->sc_convoy_desc_list && $service->sc_convoy_desc_table== NULL)
                                <div class="col-lg-12 col-md-12 SC-list">
                                    <h3>{{ $service->sc_convoy_title }}</h3>
                                    <p> {!!html_entity_decode( $service->sc_convoy_desc_paragraph)!!} </p>
                                    <p> {!!html_entity_decode( $service->sc_convoy_desc_list)!!} </p>
                                    <hr>

                                </div>

                            @elseif($service->sc_convoy_desc_paragraph && $service->sc_convoy_desc_list== NULL && $service->sc_convoy_desc_table== NULL)
                                <div class="col-lg-12 col-md-12 SC-list">
                                    <h3>{{ $service->sc_convoy_title }}</h3>
                                    <p> {!!html_entity_decode( $service->sc_convoy_desc_paragraph)!!} </p>
                                    <hr>

                                </div>
                            @endif

                        @endforeach

                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection

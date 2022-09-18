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
                                    <h2>{{ $banner->banner_title}}</h2>
                                </div>
                            </div>
                        </div>
            -->
            </div>
        </div>
    </header>
    <!--CONTACT US AREA-->
    <section class="contact-area" id="contact">
        <div class="contact-form-area section-padding ">
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
                        <div class="accordion-port">
                            @foreach($cities as $c=> $city)
                                <div>
                                    <!-- start accordion 1 -->
                                    <input class="ac-input" id="ac-{{$c}}" name="accordion-1"
                                           type="checkbox" {{($c == 0) ? 'checked' : '' }} />
                                    <label class="ac-label" for="ac-{{$c}}">{{$city->port_name}}<i></i></label>
                                    <div class="article ac-content">

                                        <!--
                                                                <div class="port-section">
                                                                    @if($city->latitude)
                                            <div class="port"> <span>Latitude:</span> {{$city->latitude}} </div>

                                        @endif
                                        @if($city->longitude)

                                            <div class="port"> <span>Longitude:</span> {{$city->longitude}} </div>

                                        @endif
                                        @if($city->time_zone)

                                            <div class="port"> <span>Time Zone:</span> {{$city->time_zone}} </div>

                                        @endif
                                        @if($city->unctad_code)

                                            <div class="port"> <span>Unctad Code:</span> {{$city->unctad_code}}</div>

                                        @endif
                                        </div>
-->
                                        @foreach($city->ports as $port)
                                            <h4>{{$port->port_details_title}}</h4>
                                            <div class="ac-list">
                                                @if($port->port_details_desc1)
                                                    <p>
                                                            <?php
                                                            $desc = nl2br($port->port_details_desc1);
                                                            $desc = str_replace("!**", "<span class='port-subtitle'>", $desc);
                                                            $desc = str_replace("**!", "</span>", $desc);
                                                            ?>
                                                            <?php echo($desc); ?>
                                                            <?php //echo nl2br($port->port_details_desc1); ?>

                                                    </p>
                                                @endif
                                                @if($port->port_details_desc_table)
                                                    <div>
                                                            <?php
                                                            $descTable = $port->port_details_desc_table;
                                                            $rows = explode("**", $descTable);
                                                            ?>
                                                        @if($port->port_details_table_has_header =="yes")

                                                            @if($port->port_details_table_num_of_cols=="6")

                                                                <table class="ac-table secondtable responsive-table"
                                                                       border="1">
                                                                    @foreach($rows as $i=> $row)
                                                                        @if($row)

                                                                                <?php
                                                                                $cols = explode("*", $row);
                                                                                ?>

                                                                            @if($i == 1)

                                                                                <thead role="rowgroup">
                                                                                <tr>
                                                                                    @foreach($cols as $col)

                                                                                        <th><strong>{{ $col }}</strong>
                                                                                        </th>
                                                                                    @endforeach

                                                                                </tr>
                                                                                </thead>
                                                                            @else
                                                                                <tr>
                                                                                    @foreach($cols as $col)

                                                                                        <td valign="middle">

                                                                                            <div><span
                                                                                                    dir="ltr">{{ $col }}</span>
                                                                                            </div>

                                                                                        </td>
                                                                                    @endforeach

                                                                                </tr>
                                                                            @endif

                                                                        @endif
                                                                    @endforeach

                                                                </table>
                                                            @elseif($port->port_details_table_num_of_cols=="5")

                                                                <table class="ac-table secondtable responsive-table2"
                                                                       border="1">
                                                                    @foreach($rows as $i=> $row)
                                                                        @if($row)

                                                                                <?php
                                                                                $cols = explode("*", $row);
                                                                                ?>

                                                                            @if($i == 1)

                                                                                <thead role="rowgroup">
                                                                                <tr>
                                                                                    @foreach($cols as $col)

                                                                                        <th><strong>{{ $col }}</strong>
                                                                                        </th>
                                                                                    @endforeach

                                                                                </tr>
                                                                                </thead>
                                                                            @else
                                                                                <tr>
                                                                                    @foreach($cols as $col)

                                                                                        <td valign="middle">

                                                                                            <div><span
                                                                                                    dir="ltr">{{ $col }}</span>
                                                                                            </div>

                                                                                        </td>
                                                                                    @endforeach

                                                                                </tr>
                                                                            @endif

                                                                        @endif
                                                                    @endforeach

                                                                </table>

                                                            @else
                                                                <table class="ac-table firsttable" border="1">
                                                                    @foreach($rows as $i=> $row)
                                                                        @if($row)

                                                                            <tr>
                                                                                    <?php
                                                                                    $cols = explode("*", $row);
                                                                                    ?>

                                                                                @foreach($cols as $col)
                                                                                    @if($i ==1)
                                                                                        <td class="title-vertical">
                                                                                            @if($col)
                                                                                                {{$col}}
                                                                                            @endif
                                                                                        </td>
                                                                                    @else
                                                                                        <td>
                                                                                            @if($col)
                                                                                                {{$col}}
                                                                                            @endif
                                                                                        </td>
                                                                                    @endif

                                                                                @endforeach
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach

                                                                </table>
                                                            @endif
                                                        @else
                                                            <table class="ac-table secondtable" border="1">

                                                                @foreach($rows as $row)
                                                                    @if($row)

                                                                        <tr>
                                                                                <?php
                                                                                $cols = explode("*", $row);
                                                                                ?>

                                                                            @foreach($cols as $j=> $col)
                                                                                @if($j ==0)
                                                                                    <td class="title-vertical">{{$col}}</td>
                                                                                @else
                                                                                    <td>{{$col}}</td>
                                                                                @endif

                                                                            @endforeach
                                                                        </tr>
                                                                    @endif
                                                                @endforeach


                                                            </table>
                                                        @endif
                                                    </div>

                                                @endif
                                                @if($port->port_details_desc2)
                                                    <p>
                                                            <?php
                                                            $desc2 = nl2br($port->port_details_desc2);
                                                            $desc2 = str_replace("!**", "<span  class='port-subtitle'>", $desc2);
                                                            $desc2 = str_replace("**!", "</span>", $desc2);
                                                            ?>
                                                            <?php echo($desc2); ?>
                                                            <?php //echo nl2br($port->port_details_desc2); ?>
                                                    </p>
                                                @endif

                                            </div>


                                            <!-------------->
                                            @if(!$loop->last)

                                                <hr class="border-ports">
                                            @endif
                                        @endforeach


                                    </div>
                                </div>
                            @endforeach
                            <!-- end accordion 1 -->


                        </div>
                    </div>


                </div>
            </div>

        </div>
        </div>
        </div>
    </section>
    <!--CONTACT US AREA END-->

@endsection

@extends('layouts.main')
@section('content')

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area single-page" id="home">
        <div class="top-area-bg" data-stellar-background-ratio="0.6"
             style="background-image: url('{{asset('/bannerImages')}}/{{ $banner->banner_image  }}');background-position: center;">

        </div>
        <!--Banner-->
        <div class="welcome-area">
            <div class="area-bg"></div>
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="welcome-text text-center">
                            <h2>{{$banner->banner_title}} </h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-top-area">
            <!--MAINMENU AREA-->
            <div class="mainmenu-area" id="mainmenu-area">
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


    </header>


    <section class="contact-area" id="contact">
        <div class="contact-form-area section-padding ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="area-title text-center">
                            <h3>Alexandria Port</h3>
                            <div class="port-section">
                                <div class="port"><span>Latitude:</span> 31°11'N</div>
                                <div class="port"><span>Longitude:</span> 029°52'E</div>
                                <div class="port"><span>Time Zone:</span> GMT +2</div>
                                <div class="port"><span>Unctad Code:</span> EGALY</div>
                            </div>
                            <!--                            <p>Need any help just send a message via our email address</p>-->
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="accordion-port">
                            @foreach($utilities as $i => $utility)
                                <div>
                                    <input class="ac-input" id="ac-{{$i}}" name="accordion-1" type="checkbox" checked/>
                                    <label class="ac-label" for="ac-{{$i}}">{{$utility->utility_title}}:<i></i></label>

                                    <!-- <div class="article ac-content">
                                        <ul class="ac-list">
                                            <li>The Harbor Is Protected By Marine Rocks And 2 Break Waters While The Width Of The Entrance Is
                                                About 400 Meters And There Are Two Fairways In Between As Follows:
                                            </li>
                                            <ul>
                                                <div>
                                                    <table class="ac-table firsttable" border="1">
                                                        <tr>
                                                            <th> &nbsp; </th>
                                                            <th>Length (m)</th>
                                                            <th>Width (m)</th>
                                                            <th>Depth (m)</th>
                                                        </tr>

                                                        <tr>
                                                            <td class="title-vertical">Big Strait</td>
                                                            <td>2000 m</td>
                                                            <td>220 m</td>
                                                            <td>14 m</td>
                                                        </tr>

                                                        <tr>
                                                            <td class="title-vertical">Small Strait</td>
                                                            <td>1600 m</td>
                                                            <td>100 m</td>
                                                            <td>9 m</td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <br>
                                                <p>The Port Is Divided Into Two Parts Separated By Coke Quays And Breakwater. The First Part Is
                                                    Entitled The Port Or The Inner Dock While The Second Is Known By The Dock Or The Outer Part And
                                                    Its Area Is 600 Hectare, Moreover The First Part Is Devoted To General Cargo Trade And The
                                                    Second For Petroleum Or Bulk Cargoes. Also Pilotage Is Obligatory For Vessels Coming In Or Out
                                                    Of The Port</p>
                                    </div> -->

                                    {!!html_entity_decode( $utility->utility_desc)!!}

                                </div>
                            @endforeach
                            <!-- end accordion 1 -->

                            <!-- <div>
                                <input class="ac-input" id="ac-2" name="accordion-1" type="checkbox" checked />
                                <label class="ac-label" for="ac-2">General Informations:<i></i></label>
                                <div class="article ac-content">
                                    <div>
                                        <table class="ac-table secondtable" border="1">
                                            <tr>
                                                <td class="title-vertical">Port Length:</td>
                                                <td>Nearly 900,000 Sq. M.</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Custom Area:</td>
                                                <td>Nearly 4.8 Km</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Customs Barrier Length:</td>
                                                <td>7 Km</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Dock Density:</td>
                                                <td>1.030</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Tide:</td>
                                                <td>1.5 Feet Above The Fixed Standard Level Of The Map</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Max Depth Permitted:</td>
                                                <td>37 Feet ( At Container Station And Coal Quay )</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div> -->
                            <!-- accordion 2 -->

                            <!-- <div>
                                <input class="ac-input" id="ac-3" name="accordion-1" type="checkbox" checked />
                                <label class="ac-label" for="ac-3">Berthes And Cargoes:<i></i></label>
                                <div class="article ac-content">
                                    <p>Total 61 Berthes</p>
                                    <div>
                                        <table class="ac-table secondtable" border="1">
                                            <tr>
                                                <td class="title-vertical">Port Length:</td>
                                                <td>Nearly 900,000 Sq. M.</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Custom Area:</td>
                                                <td>Nearly 4.8 Km</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Customs Barrier Length:</td>
                                                <td>7 Km</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Dock Density:</td>
                                                <td>1.030</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Tide:</td>
                                                <td>1.5 Feet Above The Fixed Standard Level Of The Map</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Max Depth Permitted:</td>
                                                <td>37 Feet ( At Container Station And Coal Quay )</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div> -->
                            <!-- accordion 3 -->


                            <!-- <div>
                                <input class="ac-input" id="ac-4" name="accordion-1" type="checkbox" checked />
                                <label class="ac-label" for="ac-4">Storage Areas:<i></i></label>
                                <div class="article ac-content">
                                    <div>
                                        <table class="ac-table secondtable" border="1">
                                            <tr>
                                                <td class="title-vertical">Port Length:</td>
                                                <td>Nearly 900,000 Sq. M.</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Custom Area:</td>
                                                <td>Nearly 4.8 Km</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Customs Barrier Length:</td>
                                                <td>7 Km</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Dock Density:</td>
                                                <td>1.030</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Tide:</td>
                                                <td>1.5 Feet Above The Fixed Standard Level Of The Map</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Max Depth Permitted:</td>
                                                <td>37 Feet ( At Container Station And Coal Quay )</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div> -->
                            <!-- accordion 4 -->


                            <!-- <div>
                                <input class="ac-input" id="ac-5" name="accordion-1" type="checkbox" checked />
                                <label class="ac-label" for="ac-5">Regular, Seasonal Storms and Monsoons Affecting Alexandria
                                    Port:<i></i></label>
                                <div class="article ac-content">
                                    <div id="forlaptop">
                                        <table class="ac-table secondtable" border="1">
                                            <tr>
                                                <th> Name </th>
                                                <th>Date</th>
                                                <th>Duration<br>(Day)</th>
                                                <th>Direction</th>
                                                <th>Strength</th>
                                                <th>Remarks</th>
                                            </tr>

                                            <tr>
                                                <td>Ras El Sanah<br>(The New Year)</td>
                                                <td>6/1/01</td>
                                                <td>2</td>
                                                <td>Western To Northwestern</td>
                                                <td>6 To 8</td>
                                                <td>Rainy</td>
                                            </tr>

                                            <tr>
                                                <td>Ras El Sanah<br>(The New Year)</td>
                                                <td>6/1/01</td>
                                                <td>2</td>
                                                <td>Western To Northwestern</td>
                                                <td>6 To 8</td>
                                                <td>Rainy</td>
                                            </tr>

                                            <tr>
                                                <td>Ras El Sanah<br>(The New Year)</td>
                                                <td>6/1/01</td>
                                                <td>2</td>
                                                <td>Western To Northwestern</td>
                                                <td>6 To 8</td>
                                                <td>Rainy</td>
                                            </tr>

                                            <tr>
                                                <td>Ras El Sanah<br>(The New Year)</td>
                                                <td>6/1/01</td>
                                                <td>2</td>
                                                <td>Western To Northwestern</td>
                                                <td>6 To 8</td>
                                                <td>Rainy</td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div id="formobile">
                                        <table class="ac-table secondtable " border="1">
                                            <tr>
                                                <td class="title-vertical">Name</td>
                                                <td>Ras El Sanah<br>(The New Year)</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Date</td>
                                                <td>6/1/01</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Duration</td>
                                                <td>2</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Western To Northwestern</td>
                                                <td>Western To Northwestern</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">6 To 8</td>
                                                <td>6 to 8</td>
                                            </tr>

                                            <tr>
                                                <td class="title-vertical">Remarks</td>
                                                <td>Rainy</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div> -->
                            <!-- accordion 5 -->

                        </div>
                    </div>
                    <!-- accordion 5 -->


                </div>
            </div>


        </div>
    </section>

@endsection

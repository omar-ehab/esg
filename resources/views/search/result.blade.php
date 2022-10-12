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
                                    <h2>{{ $banner->title }}</h2>
                                </div>
                            </div>
                        </div>
            -->
            </div>
        </div>
    </header>

    <!--serach AREA-->
    <section class="search-area">
        <div class="section-padding gray-bg">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $banner->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="inner-search">

                    <p class="count-found">{{$count}} Search Result Found</p>

                    @if($about)
                        @foreach($about as $obj)
                            <div class="search-result">
                                <h3 class="title-search">{{ $obj->about_title}}</h3>

                                    <?php
                                    // $exists = strpos($obj->about_desc, $query);
                                    // $replace = '<span class="highlighted">' . '<a href="">' . 'mmmm' . '</a> </span>';
                                    // $string = str_replace($query, $replace, $obj->about_desc);
                                    ?>
                                <p> {!!html_entity_decode($obj->about_desc )!!}</p>


                                <span class="highlighted"><a href="{{ route('about') }}">read more</a></span>

                            </div>
                        @endforeach
                        <!-- <hr> -->
                    @endif

                    @if($career)
                        <div class="search-result">
                            <h3 class="title-search">Careers</h3>

                            <span class="highlighted"><a href="{{ route('jobForm') }}">read more</a></span>

                        </div>
                    @endif



                    @if($contact)
                        <div class="search-result">
                            <h3 class="title-search">Contact</h3>

                            <span class="highlighted"><a href="{{ route('contactUs') }}">read more</a></span>

                        </div>
                    @endif
                    @if($news)
                        <div class="search-result">
                            <h3 class="title-search">News</h3>

                            <span class="highlighted"><a href="{{ route('news') }}">read more</a></span>

                        </div>
                    @endif

                    @if($shipAgency)
                        @foreach($shipAgency as $obj)
                            <h3 class="title-search">Ship Agency</h3>
                            <div class="search-result">
                                <h5>{{ $obj->ship_agency_desc_title1}}</h5>
                                <p>{!!html_entity_decode($obj->ship_agency_desc_paragraph )!!}</p>
                                <h5>{{ $obj->ship_agency_desc_title2}}</h5>
                                    <?php
                                    $descList = $obj->ship_agency_desc_list;
                                    $rows = explode("*", $descList);
                                    ?>
                                <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                    @foreach($rows as $row)
                                        @if($row)
                                            {!!html_entity_decode( $row)!!}
                                        @endif
                                    @endforeach
                                </td>
                                <span class="highlighted"><a href="{{ route('shipAgency') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif



                    @if($shipSupply)
                        @foreach($shipSupply as $obj)
                            <h3 class="title-search">Ship Supply</h3>
                            <div class="search-result">
                                <h5>{{ $obj->ship_supply_desc_title1}}</h5>
                                <p>{!!html_entity_decode($obj->ship_supply_desc_paragraph)!!}</p>
                                <h5>{{ $obj->ship_supply_desc_title2}}</h5>
                                    <?php
                                    $descList = $obj->ship_supply_desc_list;
                                    $rows = explode("*", $descList);
                                    ?>
                                <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                    @foreach($rows as $row)
                                        @if($row)
                                            {!!html_entity_decode( $row)!!}
                                        @endif
                                    @endforeach
                                </td>
                                <span class="highlighted"><a href="{{ route('shipSupply') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif




                    @if($husbandry)
                        @foreach($husbandry as $obj)
                            <h3 class="title-search">Husbandry</h3>
                            <div class="search-result">
                                <h5>{{ $obj->husbandry_desc_title1}}</h5>
                                <p>{!!html_entity_decode($obj->husbandry_desc_paragraph )!!}</p>
                                <h5>{{ $obj->husbandry_desc_title2}}</h5>
                                    <?php
                                    $descList = $obj->husbandry_desc_list;
                                    $rows = explode("*", $descList);
                                    ?>
                                <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                    @foreach($rows as $row)
                                        @if($row)
                                            {!!html_entity_decode( $row)!!}
                                        @endif
                                    @endforeach
                                </td>
                                <span class="highlighted"><a href="{{ route('husbandry') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif




                    @if($depotServices)
                        @foreach($depotServices as $obj)
                            <h3 class="title-search">Depot Services</h3>
                            <div class="search-result">
                                <h3 class="title-search">{{ $obj->depot_service_title}}</h3>
                                @if($obj->depot_service_desc_type == "list")
                                        <?php
                                        $descList = $obj->depot_service_desc;
                                        $rows = explode("*", $descList);
                                        ?>
                                    <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                        @foreach($rows as $row)
                                            @if($row)
                                                {!!html_entity_decode( $row)!!}
                                            @endif
                                        @endforeach
                                    </td>
                                @else
                                    <p>{!!html_entity_decode($obj->depot_service_desc )!!}</p>
                                @endif
                                <span class="highlighted"><a href="{{ route('depotService') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif


                    @if($depotLocation)
                        @foreach($depotLocation as $obj)
                            <h3 class="title-search">Depot Services</h3>
                            <div class="search-result">
                                <h3 class="title-search">{{ $obj->depot_location_title}}</h3>
                                @if($obj->depot_location_desc_type == "list")
                                        <?php
                                        $descList = $obj->depot_location_desc;
                                        $rows = explode("*", $descList);
                                        ?>
                                    <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                        @foreach($rows as $row)
                                            @if($row)
                                                {!!html_entity_decode( $row)!!}
                                            @endif
                                        @endforeach

                                    </td>
                                @else
                                    <p>{!!html_entity_decode($obj->depot_location_desc )!!}</p>
                                @endif
                                <span class="highlighted"><a href="{{ route('depotLocation') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif





                    @if($seaFreight)
                        @foreach($seaFreight as $obj)
                            <h3 class="title-search">Sea Freight</h3>
                            <div class="search-result">
                                <h3 class="title-search">{{ $obj->sea_freight_service_name}}</h3>
                                <h5>{{ $obj->sea_freight_desc_title2}}</h5>
                                    <?php
                                    $descList = $obj->sea_freight_desc_list;
                                    $rows = explode("*", $descList);
                                    ?>
                                <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                    @foreach($rows as $row)
                                        @if($row)
                                            {!!html_entity_decode( $row)!!}
                                        @endif
                                    @endforeach
                                </td>
                                <h5>{{ $obj->sea_freight_desc_title1}}</h5>
                                <p>{!!html_entity_decode($obj->sea_freight_desc_paragraph )!!}</p>
                                <span class="highlighted"><a href="{{ route('seaFreight') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif



                    @if($trucking)
                        @foreach($trucking as $obj)
                            <h3 class="title-search">Trucking</h3>
                            <div class="search-result">
                                <h3 class="title-search">{{ $obj->trucking_title}}</h3>


                                    <?php
                                    $descList = $obj->trucking_desc_list;
                                    $rows = explode("*", $descList);
                                    ?>
                                <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                    @foreach($rows as $row)
                                        @if($row)
                                            {!!html_entity_decode( $row)!!}
                                        @endif
                                    @endforeach
                                </td>


                                <p>{!!html_entity_decode($obj->trucking_desc_paragraph )!!}</p>
                                <span class="highlighted"><a href="{{ route('trucking') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif




                    @if($valueAdding)
                        @foreach($valueAdding as $obj)
                            <h3 class="title-search">Value Adding Services</h3>
                            <div class="search-result">
                                <h3 class="title-search">{{ $obj->value_adding_title}}</h3>

                                <h5>{{ $obj->value_adding_desc_title2}}</h5>

                                    <?php
                                    $descList = $obj->value_adding_desc_list;
                                    $rows = explode("*", $descList);
                                    ?>
                                <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                    @foreach($rows as $row)
                                        @if($row)
                                            {!!html_entity_decode( $row)!!}
                                        @endif
                                    @endforeach
                                </td>

                                <h5>{{ $obj->value_adding_desc_title1}}</h5>


                                <p>{!!html_entity_decode($obj->value_adding_desc_paragraph)!!}</p>
                                <span class="highlighted"><a href="{{ route('valueAdding') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif



                    @if($scServices)
                        @foreach($scServices as $obj)
                            <h3 class="title-search">Sc Services</h3>
                            <div class="search-result">
                                <h3 class="title-search">{{ $obj->sc_title}}</h3>
                                @if($obj->sc_desc_type == "list")
                                        <?php
                                        $descList = $obj->sc_desc;
                                        $rows = explode("*", $descList);
                                        ?>
                                    <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                        @foreach($rows as $row)
                                            @if($row)
                                                {!!html_entity_decode( $row)!!}
                                            @endif
                                        @endforeach
                                    </td>
                                @else
                                    <p>{!!html_entity_decode($obj->sc_desc )!!}</p>
                                @endif
                                <span class="highlighted"><a href="{{ route('scService') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif



                    @if($scConvoy)
                        @foreach($scConvoy as $obj)
                            <h3 class="title-search">Sc Convoy</h3>
                            <div class="search-result">

                                @if($obj->sc_convoy_desc_paragraph || $obj->sc_convoy_desc_list)
                                    <h3 class="title-search">{{ $obj->sc_convoy_title}}</h3>
                                        <?php
                                        $descList = $obj->sc_convoy_desc_list;
                                        $rows = explode("*", $descList);
                                        ?>
                                    <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                        @foreach($rows as $row)
                                            @if($row)
                                                {!!html_entity_decode( $row)!!}
                                            @endif
                                        @endforeach
                                    </td>
                                    <p>{!!html_entity_decode($obj->sc_convoy_desc_paragraph)!!}</p>

                                @endif
                                <div>

                                    @if($obj->sc_convoy_desc_table)
                                        <div
                                            class="{{ $obj->sc_convoy_has_header == "yes" ? "sc-content" : "col-lg-12 col-md-12 SC-list" }}">
                                            <h3>{{ $obj->sc_convoy_title }}</h3>
                                                <?php
                                                $descTable = $obj->sc_convoy_desc_table;
                                                $rows = explode("**", $descTable);
                                                ?>

                                            @if($obj->sc_convoy_has_header == "yes")
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
                                                <br>

                                            @else

                                                <table border="1" cellpadding="0" cellspacing="0" id="current">
                                                    @foreach($rows as $i=> $row)
                                                        @if($row)

                                                                <?php
                                                                $cols = explode("*", $row);
                                                                ?>
                                                            <tr>
                                                                @foreach($cols as $j=>$col)

                                                                    <td width="{{ ($j == 1) ? 134 : 339 }}"
                                                                        valign="middle">
                                                                        <div align="left">{{ $col }}</div>
                                                                    </td>
                                                                @endforeach

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </table>
                                                <br>
                                            @endif

                                        </div>
                                    @endif
                                    <!-- <hr> -->

                                </div>
                                <br>
                                <span class="highlighted"><a href="{{ route('scConvoy') }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif





                    @if($industries)
                        @foreach($industries as $obj)
                            <!-- <h3 class="title-search">{{ $obj->industriesServiceMain->service_title }}</h3> -->
                            <div class="search-result">
                                <h3 class="title-search">{{ $obj->industriesServiceMain->service_title}}</h3>
                                @if($obj->service_details_desc_type == "list")
                                        <?php
                                        $descList = $obj->service_details_desc;
                                        $rows = explode("*", $descList);
                                        ?>
                                    <td style="width: 30%;word-break: break-all;" class='hidden-480'>

                                        @foreach($rows as $row)
                                            @if($row)
                                                {!!html_entity_decode( $row)!!}
                                            @endif
                                        @endforeach
                                    </td>
                                @else
                                    <p>{!!html_entity_decode($obj->service_details_desc )!!}</p>
                                @endif
                                <span class="highlighted"><a href="{{ route('serviceDetails', $obj->service_id) }}">read more</a></span>
                            </div>
                        @endforeach
                    @endif





                    @if($portDetails)
                        <!-- <h3 class="title-search">Port Details</h3> -->

                        @foreach($portDetails as $obj)
                            <div class="search-result">

                                @if($obj->port_details_desc1 || $obj->port_details_desc2)

                                    <p>{!!html_entity_decode($obj->port_details_desc1 )!!}</p>
                                    <p>{!!html_entity_decode($obj->port_details_desc2 )!!}</p>

                                @endif

                                <div>

                                    @if($obj->port_details_desc_table)
                                        <div
                                            class="{{ $obj->port_details_has_header == "yes" ? "sc-content" : "col-lg-12 col-md-12 SC-list" }}">
                                            <h3>{{ $obj->port_details_title }}</h3>
                                                <?php
                                                $descTable = $obj->port_details_desc_table;
                                                $rows = explode("**", $descTable);
                                                ?>

                                            @if($obj->port_details_has_header == "yes")
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
                                                <br>

                                            @else

                                                <table border="1" cellpadding="0" cellspacing="0" id="current">
                                                    @foreach($rows as $i=> $row)
                                                        @if($row)

                                                                <?php
                                                                $cols = explode("*", $row);
                                                                ?>
                                                            <tr>
                                                                @foreach($cols as $j=>$col)

                                                                    <td width="{{ ($j == 1) ? 134 : 339 }}"
                                                                        valign="middle">
                                                                        <div align="left">{{ $col }}</div>
                                                                    </td>
                                                                @endforeach

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </table>
                                                <br>

                                            @endif

                                        </div>
                                    @endif

                                </div>
                                <span class="highlighted"><a href="{{ route('ports') }}">read more</a></span>
                                <!-- <hr> -->
                            </div>
                        @endforeach
                    @endif




                    <!-- <div class="search-result">
                    <h3 class="title-search">Logistics Services</h3>
                    <ul>
                        <li>Egymar offers diverse reliable and on time inland <span class="highlighted"><a href="#">trucking</a></span> services to/from all destinations inside Egypt.</li>
                        <li>Our <span class="highlighted"><a href="#">trucking</a></span> fleet includes: Mercedes Actros trucks, Thermo King Reefer trailers, Pickup trucks, vans and low bed trailers.</li>
                        <li>24-hour inland <span class="highlighted"><a href="#">trucking</a></span> services for dry and reefer cargoes to all local destinations within Egypt.</li>
                    </ul>
                </div>
                <div class="search-result">
                    <h3 class="title-search">Alexandria ports</h3>
                    <ul>
                        <li>Egymar offers diverse reliable and on time inland <span class="highlighted"><a href="#">General Cargo</a></span> services to/from all destinations inside Egypt.</li>
                    </ul>
                </div>

                <div class="search-result">
                    <h3 class="title-search">Industries Served</h3>
                    <ul>
                        <li>Egymar offers diverse reliable and on time inland <span class="highlighted"><a href="#">General Cargo</a></span> services to/from all destinations inside Egypt.</li>
                    </ul>
                </div> -->


                </div>
            </div>
        </div>
    </section>
    <!--search area  END-->

@endsection

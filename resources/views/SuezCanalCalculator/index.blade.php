@extends('layouts.main')
@section('content')
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
                                    <h2>{{ $banner->title}}</h2>
                                </div>
                            </div>
                        </div>
            -->
            </div>
        </div>
    </header>
    <section class="contact-area" id="contact">
        <div class="contact-form-area section-padding gray-bg">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>{{ $banner->title}}</h2>
                        </div>
                    </div>
                </div>

                <form action="{{ route('calculateCost')}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="toll-form calculator">


                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="ship-name" class="select-toll asterisk-none"> Ship Name</label>
                                            <input value="{{($request) ? $request['ship_name'] : "" }}" type="text"
                                                   class="form-control" id="ship-name" name="ship_name"
                                                   placeholder="Ship Name..">
                                        </div>
                                    </div>
                                </div>
                                @if ($request)
                                        <?php $typeId = $request['ship_type_id']; ?>
                                @else
                                        <?php $typeId = ""; ?>
                                        <?php $style2 = 'tiers-style2'; ?>

                                @endif
                                @if($typeId =="7")
                                        <?php $style = ""; ?>
                                        <?php $style2 = 'aftertype'; ?>

                                @else
                                        <?php $style = "hidden='hidden'"; ?>
                                        <?php $style2 = 'tiers-style2'; ?>

                                @endif

                                <div class="form-row {{$style2}}" id="js_ship_type">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="ship-type" class="select-toll"> Ship Type</label>
                                            @if($request)
                                                    <?php $typeId = $request['ship_type_id'] ?>
                                            @else
                                                    <?php $typeId = "" ?>
                                            @endif

                                            <select name="ship_type_id" id="js_ship_type" class="form-control"
                                                    onchange="viewTirs()" required='required'>
                                                <option value="" disabled selected>Please select Ship Type</option>

                                                @foreach($types as $type)
                                                    <option
                                                        value="{{$type-> ship_type_id}}" {{($type->ship_type_id == $typeId) ? 'selected' : '' }}>{{$type-> ship_type_name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" {{$style}} id="tir_div">
                                        <div class="form-holder toll-form">
                                            <label for="ship-type" class="select-toll"> Number of Tiers</label>
                                            @if($request)
                                                    <?php $tirId = $request['ship_tir'] ?>
                                            @else
                                                    <?php $tirId = "" ?>
                                            @endif

                                            <select name="ship_tir" id="js_ship_tir" class="form-control">
                                                <option value="" disabled selected>Please Select no. of Tiers</option>
                                                @foreach($tirs as $tir)

                                                    <option
                                                        value="{{$tir-> tir_id}}" {{($tir->tir_id == $tirId) ? 'selected' : '' }}>{{$tir-> tir_number - 1}}</option>
                                                @endforeach

                                            </select>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="Direction" class="select-toll">Direction</label>
                                            @if($request)
                                                    <?php $direction = $request['ship_direction'] ?>
                                            @else
                                                    <?php $direction = "" ?>
                                            @endif

                                            <select name="ship_direction" id="" class="form-control"
                                                    required='required'>
                                                <option value="" disabled selected>Please Select Direction</option>
                                                <option
                                                    value="Northbound" {{($direction == 'Northbound') ? 'selected' : '' }}>
                                                    Northbound
                                                </option>
                                                <option
                                                    value="Southbound" {{($direction == 'Southbound') ? 'selected' : '' }}>
                                                    Southbound
                                                </option>
                                            </select>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="Ship-Status" class="select-toll">Ship Status</label>
                                            @if($request)
                                                    <?php $status = $request['ship_status'] ?>
                                            @else
                                                    <?php $status = "" ?>
                                            @endif

                                            <select name="ship_status" id="" class="form-control" required='required'>
                                                <option value="" disabled selected>Please Select Ship Status</option>
                                                <option value="Laden" {{($status == 'Laden') ? 'selected' : '' }}>
                                                    Laden
                                                </option>
                                                <option value="Ballast" {{($status == 'Ballast') ? 'selected' : '' }}>
                                                    Ballast
                                                </option>
                                            </select>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="SCNT" class="select-toll">SCNT</label>
                                            <input type="number" min="0" step="0.001" class="form-control" id="SCNT"
                                                   name="SCNT" placeholder="Please Enter SCNT"
                                                   value="{{($request) ? $request['SCNT'] : "" }}" required='required'>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="SCGT" class="select-toll">SCGT</label>
                                            <input type="number" min="0" step="0.001" class="form-control" id="SCGT"
                                                   name="SCGT" placeholder="Please Enter SCGT"
                                                   value="{{($request) ? $request['SCGT'] : "" }}" required='required'>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="GRT" class="select-toll">GRT</label>
                                            <input type="number" min="0" step="0.001" class="form-control" id="GRT"
                                                   name="GRT" placeholder="Please Enter GRT"
                                                   value="{{($request) ? $request['GRT'] : "" }}" required='required'>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="Draft" class="select-toll">Draft</label>
                                            <input type="number" min="0" step="0.001" class="form-control" id="Draft"
                                                   name="Draft" placeholder="Please Enter Draft in Meter Unit"
                                                   value="{{($request) ? $request['Draft'] : "" }}" required='required'>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="Beam" class="select-toll">Beam</label>
                                            <input type="number" min="0" step="0.001" class="form-control" id="Beam"
                                                   name="Beam" placeholder="Please Enter Beam in Meter Unit"
                                                   value="{{($request) ? $request['Beam'] : "" }}" required='required'>
                                        </div>
                                    </div>


                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="Currency" class="select-toll">Currency</label>
                                            @if($request)
                                                    <?php $currency = $request['Currency'] ?>
                                            @else
                                                    <?php $currency = "" ?>
                                            @endif

                                            <select name="Currency" id="" class="form-control" required='required'>
                                                <!--                                            <option value="" disabled selected>Please Select Currency</option>-->
                                                <option value="USD"
                                                        {{($currency == 'USD') ? 'selected' : '' }} selected>USD
                                                </option>
                                            </select>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="SDR" class="select-toll asterisk-none">SDR Rate</label>
                                            <input step="0.001" type="number" min="0" class="form-control" id="SDR"
                                                   name="SDR"
                                                   placeholder="Please Enter SDR Rate for Currency You Choose(If Known)"
                                                   value="{{($request) ? $request['SDR'] : $sdrRate }}">
                                            <p><a target="_blank"
                                                  href="https://www.imf.org/external/np/fin/data/rms_five.aspx"
                                                  style="color: #032762; text-decoration: underline;">SDR Today Rate</a>
                                            </p>
                                            <p> The aim of this calculator is to give an estimate only</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <button>Calculate Now
                                            <i class="fas fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="rules-calculate">
                                    <ul>
                                        <li>The aim of this calculator is to give an estimate only . and the final
                                            result subject to final official invoices received from the local
                                            authorities
                                        </li>
                                        <li>Currencies (SDR to USD) are updated on a daily basis by data provided from
                                            the International Monetary Fund.
                                        </li>
                                        <li>The calculator is based on minimum 3 ton crane capacity for all estimates to
                                            lift mooring boat .if your vessel is not sufficiently equipped, Please
                                            contact the <a
                                                href="mailto://agencymng@egymar.com.eg"><span>Transit Desk</span></a>
                                            directly to clarify if any extra mooring boat is needed.
                                        </li>
                                        <li>The Suez Canal Authority (SCA) has implemented a rebate system as an
                                            incentive to attract more ships to use the Suez Canal instead of alternative
                                            routes. Please contact the <a href="mailto://agencymng@egymar.com.eg"><span>Transit Desk</span></a>
                                            directly for more information about rebate system's .
                                        </li>

                                        <p><b>N.B :</b> Please contact the <a
                                                href="mailto://agencymng@egymar.com.eg"><span>Transit Desk</span></a>
                                            directly for any further information or Clarification.</p>


                                    </ul>

                                </div>


                                @if($total)
                                    <!--------------- calculator result----------------------->

                                    <table border="1" cellpadding="0" cellspacing="0" class="result-table" id="js_calc">
                                        <tbody>
                                        <tr class="odd">
                                            <td valign="middle">Total SDR</td>
                                            <td valign="middle">{{$totalScntAftertir}}</td>
                                        </tr>

                                        <tr class="even">
                                            <td valign="middle">SDR Rate for</td>
                                            <td valign="middle">{{$sdrRate}}</td>
                                        </tr>

                                        <tr class="odd">
                                            <td valign="middle">Total {{($request) ? $request['Currency'] : "" }}</td>
                                            <td valign="middle">{{$totalScntAfterSdr}} {{($request) ? $request['Currency'] : "" }}</td>
                                        </tr>

                                        <tr class="even">
                                            <td valign="middle">Pilotage</td>
                                            <td valign="middle">{{$pilotageDueVal}} {{($request) ? $request['Currency'] : "" }}</td>
                                        </tr>


                                        <tr class="odd">
                                            <td valign="middle">Mooring</td>
                                            <td valign="middle">{{$mooringTotal}} {{($request) ? $request['Currency'] : "" }}</td>
                                        </tr>
                                        <tr class="even">
                                            <td valign="middle">Port & Light</td>
                                            <td valign="middle">{{$totalEamsWithGrt}} {{($request) ? $request['Currency'] : "" }}</td>
                                        </tr>
                                        <tr class="odd">
                                            <td valign="middle">Port Authority</td>
                                            <td valign="middle">{{$portAuthorityVal}} {{($request) ? $request['Currency'] : "" }}</td>
                                        </tr>
                                        @foreach($otherAuthoritys as $i=> $otherAuthority)
                                            @if($i%2 == 0)
                                                    <?php $class = 'even' ?>
                                            @else
                                                    <?php $class = 'odd' ?>

                                            @endif
                                            <tr class="{{$class}}">
                                                <td valign="middle">{{$otherAuthority->other_authoritys_title}} </td>
                                                <td valign="middle">{{$otherAuthority->other_authoritys_tariif}} {{($request) ? $request['Currency'] : "" }}</td>
                                            </tr>
                                        @endforeach


                                        <tr class="odd">
                                            <td valign="middle">Total</td>
                                            <td valign="middle">{{$total+$mooringTotal+$totalEamsWithGrt+$totalOtherAuthoritys+$portAuthorityVal}} {{($request) ? $request['Currency'] : "" }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <!--------------------------------------------------------->

                                @endif

                            </div>


                        </div>

                    </div>

                </form>
            </div>
        </div>
    </section>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script>

        window.onload = (event) => {

            <?php if ($total) : ?>
            $('html, body').animate({
                scrollTop: $("#js_calc").offset().top
            }, 100);
            <?php endif; ?>

        };

        function viewTirs() {
            var tir = $("#js_ship_type option:selected").text();
            if (tir == "Containers Ships") {
                $('#tir_div').prop('hidden', false);
                $("#js_ship_type").addClass("aftertype");


            } else {
                $('#tir_div').prop('hidden', 'hidden');
                $("#js_ship_tir option:selected").val(0);
                $("#js_ship_type").removeClass("aftertype").addClass("tiers-style2");


            }
        }
    </script>
@endsection

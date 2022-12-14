@extends('layouts.main')
@section('content')
    <section class="contact-area" id="contact">
        <div class="contact-form-area section-padding gray-bg">
            <div class="container">
                <div class="row flex-v-center">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <h2>Suez Canal Toll Calculator</h2>
                        </div>
                    </div>
                </div>
                <form action="{{ route('services.suez-canal.calculate')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="toll-form calculator">
                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="ship-name" class="select-toll asterisk-none"> Ship Name</label>
                                            <input value="{{($req) ? $req[''] : "" }}" type="text"
                                                   class="form-control" id="ship-name" name="ship_name"
                                                   placeholder="Ship Name..">
                                        </div>
                                    </div>
                                </div>
                                @if ($req)
                                        <?php $typeId = $req['ship_type_id']; ?>
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
                                            @if($req)
                                                    <?php $typeId = $req['ship_type_id'] ?>
                                            @else
                                                    <?php $typeId = "" ?>
                                            @endif

                                            <select name="ship_type_id" id="js_ship_type" class="form-control"
                                                    onchange="viewTiers()" required='required'>
                                                <option value="" disabled selected>Please select Ship Type</option>

                                                @foreach($types as $type)
                                                    <option
                                                        value="{{$type->id}}" {{($type->id == $typeId) ? 'selected' : '' }}>{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" {{$style}} id="tier_div">
                                        <div class="form-holder toll-form">
                                            <label for="ship-type" class="select-toll"> Number of Tiers</label>
                                            @if($req)
                                                    <?php $tierId = $req['ship_tier'] ?>
                                            @else
                                                    <?php $tierId = "" ?>
                                            @endif

                                            <select name="ship_tier" id="js_ship_tier" class="form-control">
                                                <option value="" disabled selected>Please Select no. of Tiers</option>
                                                @foreach($tiers as $tier)

                                                    <option
                                                        value="{{$tier->id}}" {{($tier->id == $tierId) ? 'selected' : '' }}>{{ $tier->number }}</option>
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
                                            @if($req)
                                                    <?php $direction = $req['ship_direction'] ?>
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
                                            @if($req)
                                                    <?php $status = $req['ship_status'] ?>
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
                                                   value="{{($req) ? $req['SCNT'] : "" }}" required='required'>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="SCGT" class="select-toll">SCGT</label>
                                            <input type="number" min="0" step="0.001" class="form-control" id="SCGT"
                                                   name="SCGT" placeholder="Please Enter SCGT"
                                                   value="{{($req) ? $req['SCGT'] : "" }}" required='required'>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="GRT" class="select-toll">GRT</label>
                                            <input type="number" min="0" step="0.001" class="form-control" id="GRT"
                                                   name="GRT" placeholder="Please Enter GRT"
                                                   value="{{($req) ? $req['GRT'] : "" }}" required='required'>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="Draft" class="select-toll">Draft</label>
                                            <input type="number" min="0" step="0.001" class="form-control" id="Draft"
                                                   name="Draft" placeholder="Please Enter Draft in Meter Unit"
                                                   value="{{($req) ? $req['Draft'] : "" }}" required='required'>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="Beam" class="select-toll">Beam</label>
                                            <input type="number" min="0" step="0.001" class="form-control" id="Beam"
                                                   name="Beam" placeholder="Please Enter Beam in Meter Unit"
                                                   value="{{($req) ? $req['Beam'] : "" }}" required='required'>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                        <div class="form-holder toll-form">
                                            <label for="Currency" class="select-toll">Currency</label>
                                            @if($req)
                                                    <?php $currency = $req['Currency'] ?>
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
                                                   value="{{($req) ? $req['SDR'] : $sdrRate }}">
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
                                                href="mailto://{{ $email }}"><span>Transit Desk</span></a>
                                            directly to clarify if any extra mooring boat is needed.
                                        </li>
                                        <li>The Suez Canal Authority (SCA) has implemented a rebate system as an
                                            incentive to attract more ships to use the Suez Canal instead of alternative
                                            routes. Please contact the <a href="mailto://{{ $email }}"><span>Transit Desk</span></a>
                                            directly for more information about rebate system's .
                                        </li>
                                        <p><b>N.B :</b> Please contact the <a
                                                href="mailto://{{ $email }}"><span>Transit Desk</span></a>
                                            directly for any further information or Clarification.</p>
                                    </ul>
                                </div>
                                @if($total)
                                    <table border="1" cellpadding="0" cellspacing="0" class="result-table" id="js_calc">
                                        <tbody>
                                        <tr class="odd">
                                            <td valign="middle">Total SDR</td>
                                            <td valign="middle">{{$totalScntAftertier}}</td>
                                        </tr>
                                        <tr class="even">
                                            <td valign="middle">SDR Rate for</td>
                                            <td valign="middle">{{$sdrRate}}</td>
                                        </tr>
                                        <tr class="odd">
                                            <td valign="middle">Total {{($req) ? $req['Currency'] : "" }}</td>
                                            <td valign="middle">{{$totalScntAfterSdr}} {{($req) ? $req['Currency'] : "" }}</td>
                                        </tr>
                                        <tr class="even">
                                            <td valign="middle">Pilotage</td>
                                            <td valign="middle">{{$pilotageDueVal}} {{($req) ? $req['Currency'] : "" }}</td>
                                        </tr>
                                        <tr class="odd">
                                            <td valign="middle">Mooring</td>
                                            <td valign="middle">{{$mooringTotal}} {{($req) ? $req['Currency'] : "" }}</td>
                                        </tr>
                                        <tr class="even">
                                            <td valign="middle">Port & Light</td>
                                            <td valign="middle">{{$totalEamsWithGrt}} {{($req) ? $req['Currency'] : "" }}</td>
                                        </tr>
                                        <tr class="odd">
                                            <td valign="middle">Port Authority</td>
                                            <td valign="middle">{{$portAuthorityVal}} {{($req) ? $req['Currency'] : "" }}</td>
                                        </tr>
                                        @foreach($otherAuthorities as $i => $otherAuthority)
                                            @if($i%2 == 0)
                                                    <?php $class = 'even' ?>
                                            @else
                                                    <?php $class = 'odd' ?>
                                            @endif
                                            <tr class="{{$class}}">
                                                <td valign="middle">{{$otherAuthority->title}} </td>
                                                <td valign="middle">{{$otherAuthority->tariif}} {{($req) ? $req['Currency'] : "" }}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="odd">
                                            <td valign="middle">Total</td>
                                            <td valign="middle">{{$total+$mooringTotal+$totalEamsWithGrt+$totalOtherAuthorities+$portAuthorityVal}} {{($req) ? $req['Currency'] : "" }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
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

        function viewTiers() {
            const tier = $("#js_ship_type option:selected").text();
            if (tier === "Containers Ships") {
                $('#tier_div').prop('hidden', false);
                $("#js_ship_type").addClass("aftertype");
            } else {
                $('#tier_div').prop('hidden', 'hidden');
                $("#js_ship_tier option:selected").val(0);
                $("#js_ship_type").removeClass("aftertype").addClass("tiers-style2");
            }
        }
    </script>
@endpush

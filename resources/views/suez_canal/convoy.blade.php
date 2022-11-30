@extends('layouts.main')
@section('content')
    <header class="top-area single-page" id="home">
        <div class="welcome-area"
             style="background-image: {{ 'url(\''. asset('storage/' . $banner->image_path ) . '\')'}};background-position: center;background-size: cover;">
            <div class="area-bg"></div>
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
                            <source src="{{ asset('assets/themes/theme_en/video/sc_convoy.mp4') }}" type="video/mp4">
                        </video>
                        <p class="copyright-video">Copyrights Suez Canal Authority</p>
                    </div>
                </div>

                <div class="box-white">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="text-center mt-5">
                                <h1 class="font-bold">SUEZ CANAL CONVOY SYSTEM</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div
                                class="sc-content col-lg-12 col-md-12 SC-list">
                                <div>
                                    <h3 class="title">[1] Northbound:</h3>
                                    <p class="font-bold">( For All Vessels Joining The Northbound Convoy ) , Limit time
                                        is the time
                                        passing
                                        the line North of Lat. 29 42 .8 N: This Lat. is limited by Long. 32 23.1 E &
                                        Long.
                                        32 41 .5 E.</p>
                                    <p class="font-bold">( For All Vessels ) The limit time to join N/B convoy is 23:00
                                        hrs. lt .</p>
                                    <ul>
                                        <li>Arrival time can be extended to 00:00 hrs against 5% extra canal tolls from
                                            normal transit dues with maximum SDR 12,500.
                                        </li>
                                        <li>Vessel arriving From 00:00 up to 01:00 hrs can join the northbound convoy
                                            against 10% extra canal tolls with maximum SDR 25,000.
                                        </li>
                                        <li>Vessel arriving after 01:00 hrs may join the northbound convoy, subj.to
                                            navigation permissible; against 12% extra canal dues with maximum SDR
                                            30,000.
                                        </li>
                                    </ul>
                                    <p class="sc_p_title font-bold">Above is subject to operator's approval.</p>
                                    <p>Canal entrance Starts at 04:00 hrs. - Direct Transit.</p>
                                </div>
                                <hr/>
                                <div class="sc_card">
                                    <h3 class="title">[2] Southbound:</h3>
                                    <p class="font-bold">( For All Vessels Joining The Southbound Convoy ) , Limit time
                                        is the time
                                        passing the line South of Lat. 31 28 .7 N: This Lat. is limited by Long. 32 00
                                        .27 E & Long. 32 37 .43 E.</p>
                                    <p>The limit time to join S/B convoy is 2300 hrs. lt.</p>
                                    <ul>
                                        <li>Arrival time can be extended to 00:00 hrs. Against 5% extra canal tolls from
                                            normal transit dues with maximum SDR 12,500.
                                        </li>
                                        <li>Vessel arriving from 00:00 up to 01:00 hrs can join the southbound convoy
                                            against 10% extra canal tolls with maximum SDR 25,000.
                                        </li>
                                        <li>Vessel arriving after 01:00 hrs may join the southbound convoy, subj.to
                                            navigation permissible; against 12% extra canal dues with maximum SDR
                                            30,000.
                                        </li>
                                    </ul>
                                    <p class="sc_p_title font-bold">Above is subject to operator's approval.</p>
                                    <p>Canal entrance for southbound convoy starts at 03:30 hrs. lt. - Direct
                                        Transit.</p>
                                </div>
                                <hr/>
                                <div class="sc_card">
                                    <h3 class="title">[3] Arrival Info:</h3>
                                    <p class="font-bold">48 hrs pre-arrival notes to be sent by Master to Suez Canal
                                        Authority.</p>
                                    <p class="font-bold">Also the following is necessary information in pre-arrival
                                        notes: </p>
                                    <ul>
                                        <li>Vessel name, call sign and nationality.</li>
                                        <li>Date of last transit if any.</li>
                                        <li>Owner / charter name.</li>
                                        <li>Int.GRT/NRT-SCNT/SCGT/SDWT- MAX.DFT/LOA/BEAM.</li>
                                        <li>Last Port & Destination.</li>
                                        <li>Arrival draft.</li>
                                        <li>ETA Suez Canal.</li>
                                        <li>Cargo on board including IMO cargo.</li>
                                        <li>Suez Canal projector on board and total power in watt otherwise, please
                                            inform Suez Canal in case you intend to hire one fm ashore upon your arrival
                                            to Suez canal.
                                        </li>
                                    </ul>
                                </div>
                                <hr/>
                                <div class="sc_card">
                                    <h3 class="title">[4] Transit Docs:</h3>
                                    <p class="font-bold">The following documents must be prepared and signed by master
                                        including number
                                        of copies are required as described between brackets: </p>
                                    <ul>
                                        <li>Certificate of Registry (4)</li>
                                        <li>Statistical Declaration (1)</li>
                                        <li>Information concerning a ship extracted from it's official document (1)</li>
                                        <li>Declaration of state of navigability (1)</li>
                                        <li>Information concerning vessel transiting Suez Canal (3)</li>
                                        <li>Declaration concerning use of double bottom tanks (3)</li>
                                        <li>Stowage plan / Bay plan for container ships only (2)</li>
                                        <li>Crew List (6)</li>
                                        <li>Weapon Engagement (2)</li>
                                        <li>Ports of call list (2)</li>
                                        <li>Health declaration (1)</li>
                                        <li>Vaccination list (1)</li>
                                        <li>Cargo manifest - If Loaded (3) - except container vessels</li>
                                        <li>Arms list which will be landed at SFAGA ( if any ).</li>
                                    </ul>
                                </div>
                                <hr/>
                                <div class="sc_card">
                                    <h3 class="title">[5] Official attendance:</h3>
                                    <p class="font-bold">Following official authorities and persons will board the ship
                                        on arrival and
                                        during Canal passage:</p>
                                    <ul>
                                        <li>Agent representative.</li>
                                        <li>Suez Canal authority surveyor.</li>
                                        <li>Suez Canal Electration.</li>
                                        <li>Two mooring boats with 6 crew.</li>
                                        <li>Suez Canal Pilot from outer roads to the entrance, another pilot from
                                            entrance to Ismailia and last pilot from Ismailia till other end of channel.
                                        </li>
                                    </ul>
                                </div>
                                <hr/>
                                <div class="sc_card">
                                    <h3 class="title">[6] I.S.P.S:</h3>
                                    <p class="font-bold">Suez Canal is under security level ONE.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        .title {
            font-size: 25px !important;
            font-weight: bold !important;
        }

        .font-bold {
            font-weight: bold;
        }

        .sc_card {
            margin-top: 15px;
        }

        .sc_p_title {
            margin-top: 25px;
        }
    </style>
@endpush

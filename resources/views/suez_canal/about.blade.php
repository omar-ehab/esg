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

                <div class="box-white">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="text-center mt-5">
                                <h1>ABOUT SUEZ CANAL</h1>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-12 col-md-12 SC-list">
                            <h3>The Suez Canal ( In Arabic: Qanat as-Suways )</h3>
                            <p></p>
                            <p>Is an artificial sea-level waterway running north to south across the Isthmus of Suez in
                                Egypt to connect the Mediterranean Sea and the Red Sea. The canal separates the African
                                continent from Asia, and it provides the shortest maritime route between Europe and the
                                lands lying around the Indian and western Pacific oceans. It is one of the world's most
                                heavily used shipping lanes.The Suez Canal is one of the most important waterways in the
                                world.<span style="font-weight: 400;"><br></span></p>
                            <p class="MsoNormal"
                               style="text-align: justify; line-height: normal; margin: 15.0pt 0in 15.0pt 0in;">
                                &nbsp;</p>
                            <p></p>
                            <hr>

                        </div>


                        <div class="col-lg-12 col-md-12">
                            <div class="sc-content">
                                <h3>Saving In Distance Via The Canal And The Cape:</h3>

                                <table border="1" cellpadding="0" cellspacing="0" class="movie-table">


                                    <thead role="rowgroup">
                                    <tr>

                                        <th><strong>From</strong></th>

                                        <th><strong>To</strong></th>

                                        <th><strong>Distance SC</strong></th>

                                        <th><strong>Distance Cape</strong></th>

                                        <th><strong>Saving Miles</strong></th>

                                        <th><strong>Saving %</strong></th>

                                    </tr>
                                    </thead>


                                    <tbody>
                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">RAS TANURA</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">CONSTANZA</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">4144</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">12094</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">7950</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">66 %</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">RAS TANURA</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">LAVERA</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">4684</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">10783</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">6099</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">57 %</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">RAS TANURA</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">ROTTERDAM</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">6436</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">11169</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">4733</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">42 %</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">RAS TANURA</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">NEW ORLEANS</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">9645</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">12299</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">2654</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">22 %</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">JEDDAH</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">PIRAEUS</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">1320</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">11207</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">9887</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">88 %</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">JEDDAH</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">ROTTERDAM</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">6337</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">10743</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">4406</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">41 %</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">TOKYO</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">ROTTERDAM</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">11192</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">14507</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">3315</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">23 %</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">SINGAPORE</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">ROTTERDAM</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">8288</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">11755</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">3647</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">29 %</span></div>

                                        </td>

                                    </tr>


                                    </tbody>
                                </table>


                                <hr>

                            </div>

                        </div>


                        <div class="col-lg-12 col-md-12 SC-list">

                            <h3>Advantages Of Suez Canal:</h3>
                            <p></p>
                            <ul>
                                <li>&nbsp;Longest Canal in the world with no locks.</li>
                                <li>&nbsp;Percentage of accidents is almost null compared to other waterways.</li>
                                <li>&nbsp;Navigation goes day and night.</li>
                                <li>&nbsp;Liable to be widened and deepened when required to cope with the expansion in
                                    ship size.
                                </li>
                                <li>&nbsp;The VTMS (Vessel Traffic Management System) has been introduced. It is a very
                                    accurate electronic system envisaging the most up to date radar network.
                                </li>
                                <li>&nbsp;The Suez Canal can now accommodate all Mammoth Tankers in service on their
                                    ballast trips.
                                </li>
                            </ul>
                            <p></p>
                            <hr>
                        </div>


                        <div class="col-lg-12 col-md-12 SC-list">

                            <h3>Importance Of The Suez Canal:</h3>
                            <p></p>
                            <ul>
                                <li>&nbsp;The unique geographical position of the Suez Canal makes it of special
                                    importance to the World and to Egypt as well.
                                </li>
                                <li>&nbsp;This importance is getting augmented with the evolution of Maritime Transport
                                    and World Trade.
                                </li>
                                <li>&nbsp;The Maritime transport is the cheapest means of transport, whereas more than
                                    80% of the World Trade volume is transported by means of Sea routes.
                                </li>
                                <li>&nbsp;Saving in time and in operation costs for vessels that transit the Canal.</li>
                            </ul>
                            <p></p>
                            <hr>
                        </div>


                        <div class="col-lg-12 col-md-12 SC-list">
                            <h3>Historical Outline:</h3>
                            <p></p>
                            <p><span
                                    style="font-size: 12.0pt; line-height: 107%; font-family: 'Arial',sans-serif; mso-fareast-font-family: 'Times New Roman'; color: #4a4a4a; mso-ansi-language: EN-US; mso-fareast-language: EN-US; mso-bidi-language: AR-SA;">Egypt was the first country to dig a Man–Made Canal across its lands to connect the Mediterranean Sea to the Red Sea via the River Nile and Its branches, and the first who dug it was Senausret III, Pharaoh of Egypt (1874 B.C.) This Canal was abandoned to Silting and reopened several times as follows:</span>
                            </p>
                            <p></p>
                            <p></p>
                            <ul>
                                <li>&nbsp;Canal Fo Sity I:1310 B.C.</li>
                                <li>&nbsp;Canal Of Nkhaw: 610 B.C.</li>
                                <li>&nbsp;Canal Of Darius I: 510 B.C.</li>
                                <li>&nbsp;Canal Of Ptolemy II: 285 B.C.</li>
                                <li>&nbsp;Canal Of The Romans: 117 B.C.</li>
                                <li>&nbsp;Canal Of Amir El Moemeneen: 640 A.D.</li>
                            </ul>
                            <p></p>
                            <hr>

                        </div>


                        <div class="col-lg-12 col-md-12 SC-list">

                            <h3>Following The Islamic Conquest And Remained Open For 150 Years.</h3>
                            <p></p>
                            <ul>
                                <li>&nbsp;The Suez Canal is actually the first canal directly linking the Mediterranean
                                    Sea to the Red Sea. It was opened for international navigation on 17 November 1869.
                                </li>
                                <li>&nbsp;Egypt nationalized its Canal on 26 July 1956.</li>
                                <li>&nbsp;The Canal was closed five times, the last time was most serious since it
                                    lasted for 8 years.
                                </li>
                                <li>&nbsp;The Canal was then reopened for navigation on 5 June 1975.</li>
                            </ul>
                            <p></p>
                            <hr>
                        </div>


                        <div class="col-lg-12 col-md-12">
                            <div class="sc-content">
                                <h3>Stages of developing the Suez Canal :</h3>

                                <table border="1" cellpadding="0" cellspacing="0" class="movie-table">


                                    <thead role="rowgroup">
                                    <tr>

                                        <th><strong>Item</strong></th>

                                        <th><strong>unit</strong></th>

                                        <th><strong>1869</strong></th>

                                        <th><strong>1956</strong></th>

                                        <th><strong>1962</strong></th>

                                        <th><strong>1980</strong></th>

                                        <th><strong>1994</strong></th>

                                        <th><strong>1996</strong></th>

                                        <th><strong>2001</strong></th>

                                        <th><strong>2010</strong></th>

                                        <th><strong>2015</strong></th>

                                    </tr>
                                    </thead>


                                    <tbody>
                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">Overall Length</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">km</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">164</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">175</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">175</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">189.80</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">189.80</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">189.80</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">191.80</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">193.30</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">193.30</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">ByPasses Length</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">km</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">--</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">27.7</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">27.7</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">77</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">77</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">77</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">79</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">80.5</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">113.3</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">Width at 11 m depth</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">m</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">--</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">60</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">89</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">160/175</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">170/90</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">180/200</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">195/215</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">205/225</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">205/225</span></div>

                                        </td>

                                    </tr>


                                    <tr>

                                        <td valign="middle">

                                            <div><span dir="ltr">Water depth Max.</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">m</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">8</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">14</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">15.5</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">19.5</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">20.5</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">21</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">22.5</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">24</span></div>

                                        </td>

                                        <td valign="middle">

                                            <div><span dir="ltr">24</span></div>

                                        </td>

                                    </tr>


                                    </tbody>
                                </table>


                                <hr>

                            </div>

                        </div>


                        <div class="col-lg-12 col-md-12 SC-list">
                            <h3>Capacity of the Canal :</h3>
                            <p></p>
                            <p><span style="font-weight: 400;">Suez Canal Authority has completed its planned phase to increase the Canal permissible draft to&nbsp;66 ft&nbsp;at January 2010.</span>
                            </p>
                            <p><span style="font-weight: 400;">This enables the Canal to accommodate the following percentages of the fully loaded vessels :</span>
                            </p>
                            <p>&nbsp;</p>
                            <p style="text-align: center;">
                                <span style="font-weight: 400;">
                                    <img src="{{ asset('assets/themes/theme_en/img/service/AboutSuezCanal.png') }}"
                                         alt="" width="474" height="122">
                                </span>
                            </p>
                            <p><span style="font-weight: 400;">&nbsp;</span></p>
                            <p></p>
                            <p></p>
                            <p><strong>61.2 %</strong><span style="font-weight: 400;">&nbsp;Of the Tanker Fleet</span>
                            </p>
                            <p><strong>92.7 %</strong><span
                                    style="font-weight: 400;">&nbsp;Of the Bulk Carrier Fleet</span></p>
                            <p><strong>100&nbsp;%</strong><span style="font-weight: 400;">&nbsp;Of the Container Ships &amp; Other Ships</span>
                            </p>
                            <p></p>
                            <hr>

                        </div>


                        <div class="col-lg-12 col-md-12">
                            <div class="col-lg-12 col-md-12 SC-list">
                                <h3>New Suez Canal</h3>


                                <table border="1" cellpadding="0" cellspacing="0" id="current">

                                    <tbody>
                                    <tr>

                                        <td width="339" valign="middle">
                                            <div align="left">Actual dredged quantities according to progress of works
                                            </div>
                                        </td>

                                        <td width="134" valign="middle">
                                            <div align="left">258.8 million cubic meters</div>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="339" valign="middle">
                                            <div align="left">Duration of execution</div>
                                        </td>

                                        <td width="134" valign="middle">
                                            <div align="left">12 months, including mobilization of dredgers</div>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="339" valign="middle">
                                            <div align="left">Consortium's first dredger to be employed in the project
                                            </div>
                                        </td>

                                        <td width="134" valign="middle">
                                            <div align="left">Dredger</div>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="339" valign="middle">
                                            <div align="left">Quantities of Dry excavation works</div>
                                        </td>

                                        <td width="134" valign="middle">
                                            <div align="left">250 million cubic meters</div>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="339" valign="middle">
                                            <div align="left">Highest daily rate of dredged quantities was achieved by
                                                dredger
                                            </div>
                                        </td>

                                        <td width="134" valign="middle">
                                            <div align="left">230,000 cubic meters</div>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="339" valign="middle">
                                            <div align="left">Highest daily output of dredged quantities was achieved on
                                                May 31th ,2015
                                            </div>
                                        </td>

                                        <td width="134" valign="middle">
                                            <div align="left">1.73 million cubic meters</div>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="339" valign="middle">
                                            <div align="left">Number of dredgers employed in the project</div>
                                        </td>

                                        <td width="134" valign="middle">
                                            <div align="left">45 dredgers</div>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="339" valign="middle">
                                            <div align="left">Number of sedimentation basins</div>
                                        </td>

                                        <td width="134" valign="middle">
                                            <div align="left">20 basins</div>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>

                                <hr>

                            </div>

                        </div>


                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection

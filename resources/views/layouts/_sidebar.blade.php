<div class="modal fade" id="sideNav" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <!--  <div class="modal-dialog modal-dialog-centered sidenav" role="document">-->
    <div class="ct-sidenav">
        <!--            <button class="close">×</button>-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">

                <ul class="list-unstyled ct-sidenav-list">
                    <li>
                        <div class="span3 widget-span widget-type-raw_html custom-search searchmobile" style=""
                             data-widget-type="raw_html" data-x="4" data-w="3">
                            <div class="cell-wrapper layout-widget-wrapper">
                                <span id="hs_cos_wrapper_module_14308928327274411"
                                      class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_raw_html" style=""
                                      data-hs-cos-general-type="widget" data-hs-cos-type="raw_html">
                                    <form method="post" enctype="multipart/form-data" action="#"
                                          role="search" class="navbar-form navbar-left ng-pristine ng-valid"
                                          id="express-form" novalidate="">
                                        @csrf
                                        <input required="" name="searchKeyword" placeholder="Search"
                                               class="form-control tt-input" id="express-form-typeahead-mobile"
                                               autocomplete="off" spellcheck="false" dir="auto" type="text">
                                        <button class="search-btn" type="submit"><span class="icon"></span></button>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </li>
                    <a href="#">
                        <h3 class="title-index cap">Container & Cargo Storage</h3>
                    </a>
                    <ul class="list-unstyled ct-sidenav-list">
                        <li>
                            <a href="#">Warehousing</a>
                        </li>
                        <li>
                            <a href="#">Transportation</a>
                        </li>
                    </ul>
                    <a href="#">
                        <h3 class="title-index cap">Shipping</h3>
                    </a>
                    <ul class="list-unstyled ct-sidenav-list">
                        <li>
                            <a href="#">Ship Agency Services</a>
                        </li>
                        <li>
                            <a href="#">Suez Canal Transit</a>
                        </li>
                        <li>
                            <a href="#">Husbandry Services</a>
                        </li>

                    </ul>

                    <a href="#">
                        <h3 class="title-index cap">Logistics</h3>
                    </a>
                    <ul class="list-unstyled ct-sidenav-list">
                        <li>
                            <a href="#">Ship Spares Logistics</a>
                        </li>
                        <li>
                            <a href="#">Freight Contracting</a>
                        </li>
                        <li>
                            <a href="#">Project Cargo Handling</a>
                        </li>
                        <li>
                            <a href="#">Hanging Garments</a>
                        </li>
                        <li>
                            <a href="#">Inland & Overland Transport services</a>
                        </li>
                        <li>
                            <a href="#">Customs Clearance Services</a>
                        </li>
                    </ul>

                    <a href="#">
                        <h3 class="title-index cap">Reefer</h3>
                    </a>
                    <ul class="list-unstyled ct-sidenav-list">
                        <li>
                            <a href="#">Perishable Cargo & Agro products</a>
                        </li>
                        <li>
                            <a href="#">Sea / Land Reefer Trailers Services</a>
                        </li>
                    </ul>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">

                <ul class="list-unstyled ct-sidenav-list">
                    <li>
                        <a href="{{ route('about-us') }}">
                            <h3 class="title-index">About Us</h3>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ports.index') }}">
                            <h3 class="title-index">Egyptian Sea Ports</h3>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3 class="title-index">Our Offices</h3>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('career') }}">
                            <h3 class="title-index">Careers</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact-us') }}">
                            <h3 class="title-index">Contact Us</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}">
                            <h3 class="title-index">News</h3>
                        </a>
                    </li>

                    <li>
                        <a target="_blank" download="" href="{{ asset('storage/' . $profile_link) }}">
                            <h2 class="title-index">Download company profile <i class="fas fa-download c_profile_o"></i>
                            </h2>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="separator"></div>
    </div>
</div>

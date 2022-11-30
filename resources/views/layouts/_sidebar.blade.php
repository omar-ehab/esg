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
                    @foreach($services as $service)
                        <a href="{{ route('services.show', $service->slug) }}">
                            <h3 class="title-index cap">{{ $service->name }}</h3>
                        </a>
                        @if($service->children)
                            <ul class="list-unstyled ct-sidenav-list">
                                @foreach($service->children as $child)
                                    <li>
                                        <a href="{{ route('services.show', $child->slug) }}">{{ $child->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                    <a href="{{ route('services.suez-canal') }}">
                        <h3 class="title-index cap">Suez Canal</h3>
                    </a>
                    <ul class="list-unstyled ct-sidenav-list">
                        <li>
                            <a href="{{ route('services.suez-canal.about') }}">About Suez Canal</a>
                        </li>
                        <li>
                            <a href="{{ route('services.suez-canal.convoy') }}">Suez Canal Convoy</a>
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
                        <a href="{{ route('equipment.index') }}">
                            <h3 class="title-index">Equipment</h3>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('offices.index') }}">
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
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="toll-box-menu">
                    <h1>Suez Canal Toll Calculator</h1>
                    <img src="{{ asset('assets/themes/theme_en/img/suez-canal.png') }}">
                    <a href="{{ route('services.suez-canal.calculator') }}" class="btn-calculator">Calculate <i
                            class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

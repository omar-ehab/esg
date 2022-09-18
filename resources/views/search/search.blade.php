<div class="search-and-language-bar pull-right">
    <ul>

        <li>
            <div class="span3 widget-span widget-type-raw_html custom-search" style="" data-widget-type="raw_html" data-x="4" data-w="3">
                <div class="cell-wrapper layout-widget-wrapper">
                    <span id="hs_cos_wrapper_module_14308928327274411" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_raw_html" style="" data-hs-cos-general-type="widget" data-hs-cos-type="raw_html">
                        <form method="post" enctype="multipart/form-data" action="{{ route('search') }}" role="search" class="navbar-form navbar-left ng-pristine ng-valid" id="express-form" novalidate="">
                            @csrf
                            <input required="" name="searchKeyword" placeholder="Search" class="form-control tt-input" id="express-form-typeahead" autocomplete="off" spellcheck="false" dir="auto" type="text">
                            <button class="search-btn" type="submit"><span class="icon"></span></button>
                        </form>
                    </span>
                </div>
            </div>
        </li>
        <li>
            <a href="javascript:;" data-toggle="modal" data-target="#sideNav"> <button id="sidenav-toggle"> <i class="fas fa-bars"></i> </button></a>
        </li>

    </ul>
</div>
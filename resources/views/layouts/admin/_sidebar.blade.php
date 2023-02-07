<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.home') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ asset('assets/themes/theme_en/img/logos/blue-logo.png') }}" alt="Al Farouk Logo"
                     width="50px">
              </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">ESG</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 ps ps--active-y">
        {{--Dashboard--}}
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.home') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        {{--Pages--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.about') ? 'active' : '' }}">
            <a href="{{ route('admin.about.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                <div data-i18n="About Us">About Us</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.ports') ? 'active' : '' }}">
            <a href="{{ route('admin.ports.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-ship"></i>
                <div data-i18n="Egyptian Sea Ports">Egyptian Sea Ports</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.news') ? 'active' : '' }}">
            <a href="{{ route('admin.news.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="News">News</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.services') ? 'active' : '' }}">
            <a href="{{ route('admin.services.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid"></i>
                <div data-i18n="Services">Services</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.maritime_laws') ? 'active' : '' }}">
            <a href="{{ route('admin.maritime_laws.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file-pdf"></i>
                <div data-i18n="Maritime Laws">Maritime Laws</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.equipment') ? 'active' : '' }}">
            <a href="{{ route('admin.equipment.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-truck"></i>
                <div data-i18n="Equipment">Equipment</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.our-offices') ? 'active' : '' }}">
            <a href="{{ route('admin.our-offices.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-current-location"></i>
                <div data-i18n="Our Offices">Our Offices</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.scope-of-activities') ? 'active' : '' }}">
            <a href="{{ route('admin.scope-of-activities.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Our Offices">Scope of Activities</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Suez Canal Calculator</span>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.grt_details') ? 'active' : '' }}">
            <a href="{{ route('admin.grt_details.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid-alt"></i>
                <div data-i18n="Grt Details">Grt Details</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.pilotage_dues') ? 'active' : '' }}">
            <a href="{{ route('admin.pilotage_dues.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-navigation"></i>
                <div data-i18n="Pilotage Dues">Pilotage Dues</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.suez_canal_costs') ? 'active' : '' }}">
            <a href="{{ route('admin.suez_canal_costs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Suez Canal Costs">Suez Canal Costs</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.tiers') ? 'active' : '' }}">
            <a href="{{ route('admin.tiers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Tiers">Tiers</div>
            </a>
        </li>
        {{--Contact--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Contact</span>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.contact-us-messages') ? 'active' : '' }}">
            <a href="{{ route('admin.contact-us-messages.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Contact Messages">Contact Messages</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.subscribers') ? 'active' : '' }}">
            <a href="{{ route('admin.subscribers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Subscribers">Subscribers</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.inquiries') ? 'active' : '' }}">
            <a href="{{ route('admin.inquiries.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-inbox"></i>
                <div data-i18n="Inquiries">Inquiries</div>
            </a>
        </li>
        {{--Career--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Career</span>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.jobs') ? 'active' : '' }}">
            <a href="{{ route('admin.jobs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div data-i18n="Jobs">Jobs</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.careers') ? 'active' : '' }}">
            <a href="{{ route('admin.careers.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-receipt"></i>
                <div data-i18n="Careers">Careers</div>
            </a>
        </li>
        {{--Settings--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.certificates') ? 'active' : '' }}">
            <a href="{{ route('admin.certificates.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-certification"></i>
                <div data-i18n="Certificates">Certificates</div>
            </a>
        </li>
        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.banners') ? 'active' : '' }}">
            <a href="{{ route('admin.banners.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-carousel"></i>
                <div data-i18n="Banners">Banners</div>
            </a>
        </li>

        <li class="menu-item {{ str_contains(Route::currentRouteName(), 'admin.settings') ? 'active' : '' }}">
            <a href="{{ route('admin.settings.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
        </li>
    </ul>
</aside>

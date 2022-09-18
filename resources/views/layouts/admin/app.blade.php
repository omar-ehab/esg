<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    @include('layouts.admin._head')
    <title>@yield('title')</title>
    @stack('styles')
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('layouts.admin._sidebar')
        <div class="layout-page">
            @include('layouts.admin._navbar')
            <div class="content-wrapper">

                @yield('content')


                @include('layouts.admin._footer')
                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <form action="{{ route('admin.logout') }}" method="post" id="logout_form">
        @csrf
    </form>
</div>

@include('layouts.admin._scripts')
@stack('scripts')
</body>
</html>

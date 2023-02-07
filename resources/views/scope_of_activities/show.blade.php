@extends('layouts.main')
@section('content')

    <header class="top-area single-page" id="home">

        <div class="welcome-area"
             style="background-image: url('{{asset('storage/' . $scopeOfActivity->page->banner->image_path)}}');background-position: center;background-size: cover;">
            <div class="area-bg"></div>
            <div class="container">
            </div>
        </div>
    </header>
    <!--ABOUT AREA-->

    <!--SERVICES AREA-->
    <section class="blog-area blog-page section-padding">
        <div class="container">
            <div class="row flex-v-center">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="text-center">
                        <h2>{{$scopeOfActivity->name}}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    <div class="shipping-service wow fadeIn">

                        <div class="shipping-service-details industrypage">
                            {!! $scopeOfActivity->description !!}
                        </div>
                    </div>


                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">

                        <div class="single-sidebar-widget widget_categories">
                            <h4>Scope Of Activities</h4>
                            <ul>
                                @foreach($scopeOfActivities as $scope)
                                    <li>
                                        <a href="{{ route('scope-of-activities.show', $scope->slug) }}">{{$scope->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
